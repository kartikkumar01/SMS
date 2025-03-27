// SIGNUP FORM SCRIPT

//----------------toggle between show and hide password starts------------------
let showHidePasswordBtn = document.getElementById('showHidePasswordBtn');
let pass = document.getElementById('password');

showHidePasswordBtn.addEventListener('click', () => {
    toggleBetweenTwoClasses(showHidePasswordBtn,'fa-eye-slash','fa-eye');
    if(showHidePasswordBtn.classList.contains('fa-eye')){
        pass.type = 'text';
    }else{
        pass.type = 'password';
    }
})
//----------------toggle between show and hide password ends------------------




function toggleBetweenTwoClasses(element, property1, property2){
    if(element.classList.contains(property1)){
        element.classList.remove(property1);
        element.classList.add(property2);
    }else{
        element.classList.add(property1);
        element.classList.remove(property2);
    }
}
