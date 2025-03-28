

// search bar hide show js in mobile
const searchIcon = document.getElementById('searchIcon');
//this is input + icon
const searchBar = document.getElementById('searchBar');
const overlay = document.getElementById('overlay');

// these are two parts of search bar
const stockSearchBtn = document.getElementById('stockSearchBtn')
const stockSearchBar = document.getElementById('stockSearchBar')

searchIcon.addEventListener(('click'), ()=>{
    toggleBetweenTwoClasses(overlay, 'flex','hidden');
    toggleBetweenTwoClasses(searchBar,'scale-0','scale-100');
    stockSearchBar.focus()
    hideBothCards();
    stockSearchBar.value = ''
    toggleBetweenTwoClasses(searchIcon, 'block','hidden');
})
window.addEventListener('keyup',(e)=>{
    if(e.key == 'Control'){
        toggleBetweenTwoClasses(overlay, 'flex','hidden');
        toggleBetweenTwoClasses(searchBar,'scale-0','scale-100');
        stockSearchBar.focus()
        hideBothCards();
        stockSearchBar.value = ''
        toggleBetweenTwoClasses(searchIcon, 'block','hidden');
    }
})
overlay.addEventListener('click',()=>{
    toggleBetweenTwoClasses(overlay, 'flex','hidden');
    toggleBetweenTwoClasses(searchBar,'scale-0','scale-100');
    //making both of the cards scale to 0 when user clicks on overlay
    hideBothCards();
    toggleBetweenTwoClasses(searchIcon, 'block','hidden');
    stockSearchBar.value = ''
    validationMessage.textContent = ''
    loader.style.display='none';
})



// -----------------------------------FETCHING--------------------------------------

// these are the four sections of the card
const stockIPO = document.getElementById('stockIPO')
const stockImage = document.getElementById('stockImage')
const stockLink = document.getElementById('stockLink')
const stockSymbol = document.getElementById('stockSymbol')
const stockCompany = document.getElementById('stockCompany')
const stockPrice = document.getElementById('stockPrice')



// these are two cards either stock found or not
const stockInfoCard = document.getElementById('stockInfoCard')
const notFoundCard = document.getElementById('notFoundCard')

// this is the area above the search bar for the validation message
const validationMessage = document.getElementById('validationMessage')
const loader = document.getElementById('loader');


//I will fetch it from backend
const apiKey = 'cvijhvhr01qks9qat1u0cvijhvhr01qks9qat1ug';
let symbol;

// validate the user input
stockSearchBar.addEventListener('input',()=>{
    hideBothCards()
    const input = stockSearchBar.value;
    
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

//----- This is for when the user presses clicks to search------
stockSearchBtn.addEventListener('click',()=>{ 
    //show warning if the input is empty and user click on search
    if(stockSearchBar.value == ''){
        validationMessage.textContent= 'Input cannot be empty'
        stockSearchBtn.setAttribute('disabled','true')
        hideBothCards()
    }else{
        showLoader()
        fetchStockDetails()
    }
})

//----- This is for when the user presses enter key to search stock------
stockSearchBar.addEventListener('keyup',(e)=>{ 
    if(e.key == 'Enter'){
        if(validationMessage.innerText == '' && stockSearchBar.value != ''){
                showLoader()
                fetchStockDetails()
        }else if(stockSearchBar.value == ''){
            validationMessage.textContent= 'Input cannot be empty'
            stockSearchBtn.setAttribute('disabled','true')
            hideBothCards()
        }
    }
})

function hideBothCards(){
    stockInfoCard.style.scale ="0";
    notFoundCard.style.scale ="0";
}
function showcard(card){
    card.style.scale ="1";
}

function fetchStockDetails(){
    hideBothCards()
    symbol = stockSearchBar.value.trim().toUpperCase();
    fetch(`https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}`)
    .then((response) => response.json())
    .then((data)=>{
        if(Object.keys(data).length == 0 || Object.keys(data).length == 1 || data.c == 0){
            hideBothCards()
            hideLoader()
            showcard(notFoundCard)
        }
        else{
            stockPrice.textContent = data.c
            fetch(`https://finnhub.io/api/v1/stock/profile2?symbol=${symbol}&token=${apiKey}`)
            .then((response) => response.json())
            .then((data)=>{
                if(Object.keys(data).length == 0 || Object.keys(data).length == 1){
                    hideBothCards()
                    hideLoader()
                    showcard(notFoundCard)
                }else{
                    stockIPO.textContent = new Date(data.ipo).toLocaleDateString()
                    stockImage.src = data.logo;
                    stockSymbol.textContent = data.ticker
                    stockLink.href = data.weburl
                    stockCompany.textContent = data.name
                    stockImage.addEventListener('load',()=>{
                        hideLoader()
                        hideBothCards()
                        showcard(stockInfoCard)
                    });
                }
            })
        }
    })



}

function showLoader(){
    loader.style.display = "block";
}
function hideLoader(){
    loader.style.display = "none";
}


