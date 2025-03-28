const logoutBtn = document.getElementById('logoutBtn');
logoutBtn.addEventListener('click', ()=>{
    const confirmValue = confirm('Are you sure to Log out ? ')
    if(confirmValue === true){
        logoutAjaxReq()
    }
})

function logoutAjaxReq(){
    const xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const jsonResponse = JSON.parse(xhr.responseText)
            if(jsonResponse.status == true){
                window.location.href = 'login.php'
            }
        }
    }
    xhr.open('GET','api/logout.php')
    xhr.send()
}