// ----------------learn button starts--------------------
let learnBtn = document.getElementById('learnBtn');
let learnList = document.getElementById('learnList');
let learnListOverlay = document.getElementById('learnListOverlay');
learnBtn.addEventListener('click', (e) => {
    learnList.classList.toggle('max-h-100');
    learnList.classList.toggle('p-4');
    learnListOverlay.classList.toggle('hidden');
})

learnListOverlay.addEventListener('click',()=>{
    learnListOverlay.classList.toggle('hidden');
    learnList.classList.toggle('max-h-100');
    learnList.classList.toggle('p-4');
})
// -------------------learn button ends-----------------

//----------------hamburger button toggle script starts-------------
let hamburgerBtn = document.getElementById('hamburgerBtn');
let hamburgerList = document.getElementById('hamburgerList');
let hamburgerListOverlay = document.getElementById('hamburgerListOverlay');
hamburgerBtn.addEventListener('click', (e) => {
    toggleBetweenTwoClasses(hamburgerBtn.firstChild,'fa-bars','fa-close');
    hamburgerList.classList.toggle('py-2.5');
    hamburgerList.classList.toggle('max-h-100');
    hamburgerListOverlay.classList.toggle('hidden');
})

hamburgerListOverlay.addEventListener('click',()=>{
    toggleBetweenTwoClasses(hamburgerBtn.firstChild,'fa-bars','fa-close');
    hamburgerList.classList.toggle('py-2.5');
    hamburgerList.classList.toggle('max-h-100');
    hamburgerListOverlay.classList.toggle('hidden');
})
//--------------hamburger button toggle script ends-------------


// search bar hide show js in mobile
const searchIcon = document.getElementById('searchIcon');
const searchBar = document.getElementById('searchBar');
const overlay = document.getElementById('overlay');

searchIcon.addEventListener(('click'), ()=>{
    toggleBetweenTwoClasses(overlay, 'flex','hidden');
    toggleBetweenTwoClasses(searchBar,'scale-0','scale-100');
})

overlay.addEventListener('click',()=>{
    toggleBetweenTwoClasses(overlay, 'flex','hidden');
    toggleBetweenTwoClasses(searchBar,'scale-0','scale-100');
})


// This function toggles between two given classes
function toggleBetweenTwoClasses(element, property1, property2){
    if(element.classList.contains(property1)){
        element.classList.remove(property1);
        element.classList.add(property2);
    }else{
        element.classList.add(property1);
        element.classList.remove(property2);
    }
}