const loginForm = document.getElementById('loginForm');
const clientErrMsgBox = document.getElementById('clientValidationError')
const username = document.getElementById('username')
const password = document.getElementById('password')
const loginOverlay = document.getElementById('loginOverlay')
const trueMsgBox = document.getElementById('trueMessageBox')
const falseMsgbox = document.getElementById('falseMessageBox')

//It will used to check if validation is done then only I send ajax request
let flag = false

//These two event listeners are to clear the error message if user types again
loginForm.addEventListener('input', () => showClientMessage(''))

//Listens the form submit event
loginForm.addEventListener('submit',(e) => {
    e.preventDefault() 
    clientSideValidation() //Make the flag true if everything is fine
    if(flag == true) ajaxReq()
})

function clientSideValidation(){
    if (username.value == '') {
        showClientMessage('Username is empty');
    } else if (password.value == '') {
        showClientMessage('Password is empty');
    }else {
        flag = true;
        showClientMessage(''); // Clear error if everything is valid
    }
}

function showClientMessage(message){
    clientErrMsgBox.textContent = message
}
function showServerMessage(status,message){
    if(status == true){
        trueMsgBox.style.display = 'block';
        trueMsgBox.textContent = message;
        setTimeout(() => {
            trueMsgBox.style.display = 'none';
        }, 3000);
    }else{
        falseMsgbox.style.display = 'block';
        falseMsgbox.textContent = message;
        setTimeout(() => {
            falseMsgbox.style.display = 'none';
        }, 3000);

    }
}

function ajaxReq(){
const formdata = new FormData(loginForm)
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function (){
    loginOverlay.style.display = 'block'
    showLoader()
    if(xhr.readyState == xhr.DONE && xhr.status == 200){
        loginOverlay.style.display = 'none'
        hideLoader()
        const response = JSON.parse(xhr.responseText)
        if(response.status == true){
            //Redirecting the user after sucessfull login
            window.location.href = './portfolio.php';
        }
        showServerMessage(response.status, response.message)
    }
}
xhr.open('POST', './api/login_submit.php');
xhr.send(formdata);
}