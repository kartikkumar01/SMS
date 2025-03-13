// learn button starts--------------------
let learnBtn = document.getElementById('learnBtn');
let learnList = document.getElementById('learnList');
learnBtn.addEventListener('click', (e) => {
    // learnList.classList.toggle('border');
    learnList.classList.toggle('max-h-100');
    learnList.classList.toggle('p-4');
})
// learn button ends-----------------

//hamburger button toggle script starts-------------
let hamburgerBtn = document.getElementById('hamburgerBtn');
let hamburgerList = document.getElementById('hamburgerList');
hamburgerBtn.addEventListener('click', (e) => {
    hamburgerList.classList.toggle('max-h-100');
    hamburgerList.classList.toggle('py-2.5');
    if(hamburgerBtn.classList.contains('flex')){
        hamburgerList.classList.remove('flex');
        hamburgerList.classList.add('hidden');
    }else{
        hamburgerList.classList.remove('hidden');
        hamburgerList.classList.add('flex');
    }
})
//hamburger button toggle script ends-------------