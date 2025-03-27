const signupForm = document.getElementById('signupForm');
const clientErrMsgBox = document.getElementById('clientValidationError')
const fullname = document.getElementById('fullname')
const username = document.getElementById('username')
const password = document.getElementById('password')
const confirmPassword = document.getElementById('confirmPassword')
const signupOverlay = document.getElementById('signupOverlay')
const trueMsgBox = document.getElementById('trueMessageBox')
const falseMsgbox = document.getElementById('falseMessageBox')

//It will used to check if validation is done then only I send ajax request
let flag = false

//These two event listeners are to clear the error message if user types again
signupForm.addEventListener('input', () => showClientMessage(''))

//Listens the form submit event
signupForm.addEventListener('submit',(e) => {
    e.preventDefault() 
    clientSideValidation() //Make the flag true if everything is fine
    if(flag == true) ajaxReq()
})

function clientSideValidation(){
    if (fullname.value == '') {
        showClientMessage('Full name is empty');
    } else if (fullname.value.search(/[^a-zA-Z\s]/g) != -1) {
        showClientMessage('Full name can only contain letters');
    } else if (username.value == '') {
        showClientMessage('Username is empty');
    } else if (password.value == '') {
        showClientMessage('Password is empty');
    } else if (confirmPassword.value == '') {
        showClientMessage('Please confirm the password');
    } else if (password.value != confirmPassword.value) {
        showClientMessage('Passwords do not match');
    } else {
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
const formdata = new FormData(signupForm)
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function (){
    signupOverlay.style.display = 'block'
    showLoader()
    if(xhr.readyState == xhr.DONE && xhr.status == 200){
        signupOverlay.style.display = 'none'
        hideLoader()
        const response = JSON.parse(xhr.responseText)
        if(response.status == true){
            signupForm.reset()
        }
        showServerMessage(response.status, response.message)
    }
}
xhr.open('POST', 'signup_submit.php');
xhr.send(formdata);
}