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
    hideBothCards();
    stockSearchBar.value = ''
    toggleBetweenTwoClasses(searchIcon, 'block','hidden');
})

overlay.addEventListener('click',()=>{
    toggleBetweenTwoClasses(overlay, 'flex','hidden');
    toggleBetweenTwoClasses(searchBar,'scale-0','scale-100');
    //making both of the cards scale to 0 when user clicks on overlay
    hideBothCards();
    toggleBetweenTwoClasses(searchIcon, 'block','hidden');
    stockSearchBar.value = ''
    validationMessage.textContent = ''
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



//------------------ This code is of the stock search bar api ------------------
//finnhub api
//stock profile api -> https://finnhub.io/api/v1/stock/profile2?symbol=${symbol}&token=${apiKey}
// stock quote api - >https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}
//api key -> cvamlkhr01qsapma7ru0cvamlkhr01qsapma7rug

//Finnhub return empty object for invalid symbol
//Finnhub returns object with 1 property called error for invalid key
//Finnhub returns response if everything is alright

const apiKey = 'cvamlkhr01qsapma7ru0cvamlkhr01qsapma7rug';
let symbol;

// these are the four sections of the card
const stockImage = document.getElementById('stockImage')
const symbolName = document.getElementById('symbolName')
const companyName = document.getElementById('companyName')
const stockPrice = document.getElementById('stockPrice')

// these are two parts of search bar
const stockSearchBtn = document.getElementById('stockSearchBtn')
const stockSearchBar = document.getElementById('stockSearchBar')

// these are two cards either stock found or not
const stockInfoCard = document.getElementById('stockInfoCard')
const notFoundCard = document.getElementById('notFoundCard')

const validationMessage = document.getElementById('validationMessageInMobile')

stockSearchBar.addEventListener('input',()=>{
    hideBothCards()
    const input = stockSearchBar.value;
    
    // validate the user input if anything entered other than letters
    if(input.search(/[^a-zA-Z]/g) != -1){
        validationMessage.textContent= 'Only letters are allowed'
        stockSearchBtn.setAttribute('disabled','true')
    }else if(input.length > 8){
        validationMessage.textContent= 'Length is too long'
        stockSearchBtn.setAttribute('disabled','true')
    }else{
        validationMessage.textContent= ''
        stockSearchBtn.removeAttribute('disabled')
    }
})
const loader = document.getElementById('loader');

stockSearchBtn.addEventListener('click',()=>{ 
    //show warning if the input is empty and user click on search
    if(stockSearchBar.value == ''){
        validationMessage.textContent= 'Input cannot be empty'
        stockSearchBtn.setAttribute('disabled','true')
        hideBothCards()
    }else{
        //if ok then start loading animation 
        loader.style.display = "block";
        //then send request
        fetchStockDetailsForMobile()
    }
})

function hideBothCards(){
    stockInfoCard.style.scale ="0";
    notFoundCard.style.scale ="0";
}
function showcard(card){
    card.style.scale ="1";
}
function fetchStockDetailsForMobile(){
    hideBothCards()
    symbol = stockSearchBar.value.trim();
    fetch(`https://finnhub.io/api/v1/stock/profile2?symbol=${symbol}&token=${apiKey}`)
    .then((response) => response.json())
    .then((data)=>{
        if(Object.keys(data).length == 0 || Object.keys(data).length == 1){
            hideBothCards()
            loader.style.display = "none";
            showcard(notFoundCard)
        }else{
            stockImage.src = data.logo;
            symbolName.textContent = data.ticker
            companyName.textContent = data.name

            fetch(`https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}`)
            .then((response) => response.json())
            .then((data)=>{
                if(Object.keys(data).length == 0 || Object.keys(data).length == 1){
                    hideBothCards()
                    loader.style.display = "none";
                    showcard(notFoundCard)
                }else{
                    stockPrice.textContent = data.c
                    stockImage.addEventListener('load',()=>{
                        loader.style.display = "none";
                        hideBothCards()
                        showcard(stockInfoCard)
                    });
                }
            })
        }
    })
}


//-------------- This code is of the stock search bar api for DESKTOP ----------------------
stockSearchBar.addEventListener('keyup',(e)=>{ 
    if(e.key == 'Enter'){
        if(validationMessage.innerText == '' && stockSearchBar.value != ''){
                //if ok then start loading animation 
                loader.style.display = "block";
                //then send request
                fetchStockDetailsForMobile()
        }else if(stockSearchBar.value == ''){
            validationMessage.textContent= 'Input cannot be empty'
            stockSearchBtn.setAttribute('disabled','true')
            hideBothCards()
        }
    }
})