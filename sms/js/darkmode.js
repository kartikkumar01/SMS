let darkLightBtn = document.getElementById('darkLightBtn');

//setting the default dark light mode
checkDefaultTheme();

// dark light mode toggle script starts here-------------
darkLightBtn.addEventListener('click',(e) => {
    changeIcon();
    updateLocalStorage();
    changeScreenTheme();
    })


function changeIcon(){
    if(darkLightBtn.classList.contains('fa-moon')){
        darkLightBtn.classList.remove('fa-moon');
        darkLightBtn.classList.add('fa-sun');
    }else{
        darkLightBtn.classList.remove('fa-sun');
        darkLightBtn.classList.add('fa-moon');
    }
}

function updateLocalStorage(){
    if(darkLightBtn.classList.contains('fa-moon')){
        localStorage.setItem('dark','false');
        // document.documentElement.classList.remove('dark');
    }else{
        localStorage.setItem('dark','true');
        // document.documentElement.classList.add('dark');
    }
}

function changeScreenTheme(){
    if(localStorage.getItem('dark') == "true"){
        document.documentElement.classList.add('dark');
    }else{
        document.documentElement.classList.remove('dark');
    }
}

function checkDefaultTheme(){
    if(localStorage.getItem('dark') == 'true'){
        document.documentElement.classList.add('dark');
        darkLightBtn.classList.remove('fa-moon');
        darkLightBtn.classList.add('fa-sun');
    }
}
