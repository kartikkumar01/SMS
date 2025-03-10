// learn button toggle script starts--------------------
let learnBtn = document.getElementById('learnBtn');
let learnList = document.getElementById('learnList');
learnBtn.addEventListener('click', (e) => {
    // learnList.classList.toggle('border');
    learnList.classList.toggle('max-h-100');
    learnList.classList.toggle('p-4');
})
// learn button toggle script ends-----------------

//hamburger button toggle script starts-------------
let hamburgerBtn = document.getElementById('hamburgerBtn');
let hamburgerList = document.getElementById('hamburgerList');
hamburgerBtn.addEventListener('click', (e) => {
    console.log("hi");
    
    // hamburgerList.classList.toggle('border');
    hamburgerList.classList.toggle('max-h-100');
})
//hamburger button toggle script ends-------------

// dark light mode toggle script starts here-------------
let darkLightBtn = document.getElementById('darkLightBtn');
darkLightBtn.addEventListener('click',(e) => {
    if(darkLightBtn.classList.contains('fa-moon')){
        darkLightBtn.classList.remove('fa-moon');
        darkLightBtn.classList.add('fa-sun');
    }else{
        darkLightBtn.classList.remove('fa-sun');
        darkLightBtn.classList.add('fa-moon');
    }
    document.documentElement.classList.toggle('dark');
})
// dark light mode toggle script ends here-------------