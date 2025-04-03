// --------------Fetching balance and displaying it on the page-------------------
//This balance will be shown on screen
const balance1 = document.getElementById('balance1')
//This balance will be shown on card
const balance2 = document.getElementById('balance2')
const xhr1 = new XMLHttpRequest()
xhr1.onreadystatechange = () => {
    if(xhr1.readyState == xhr1.DONE && xhr1.status == 200){
        const response = JSON.parse(xhr1.responseText)
        if(response.status == true){
            //convert the balance in comman separated values
            const balanceResponse = Number(response.message).toLocaleString()
            //displaying the balances
            balance1.textContent = `$${balanceResponse}`
            balance2.textContent = `$${balanceResponse}`
        }else{
            balance1.textContent = `- - - - -`
            balance2.textContent = `- - - - -`
        }
    }
}
xhr1.open('GET','api/fetch_balance_api.php')
xhr1.send()


// --------------Search API-------------------
//This element is the quantity in the card
const quantityInCard = document.getElementById('quantityInCard')

const apiKey = 'cvijhvhr01qks9qat1u0cvijhvhr01qks9qat1ug';
let symbol;
let flag = false

// These are the search form elements
const searchForm = document.getElementById('searchForm')
const searchBar = document.getElementById('searchBar')
const searchStockBtn = document.getElementById('searchStockBtn')
const searchOverlay = document.getElementById('searchOverlay')
const validationMessage = document.getElementById('validationMessage')

// These are the cards and loader
const stockInfoCard = document.getElementById('stockInfoCard')
const notFoundCard = document.getElementById('notFoundCard')
const loader = document.getElementById('loader')

//These are the card components
const stockImage = document.getElementById('stockImage')
const stockSymbol = document.getElementById('stockSymbol')
const stockPrice = document.getElementById('stockPrice')

function overlayDisplay(value){
    switch(value){
        case 'show' : searchOverlay.style.display = 'block'
        break
        case 'hide' :  searchOverlay.style.display = 'none'
    }
}
function formDisplay(value){
    switch(value){
        case 'show' : searchForm.style.scale = 1
        break
        case 'hide' :  searchForm.style.scale = 0
    }
}
function clearInput(){
    searchBar.value = ''
}
function showLoader(){
    loader.style.display = "block";
}
function hideLoader(){
    loader.style.display = "none";
}
function hideBothCards(){
    stockInfoCard.style.scale ="0";
    notFoundCard.style.scale ="0";
}
function showcard(card){
    card.style.scale ="1";
}

searchStockBtn.addEventListener('click', () => {
    overlayDisplay('show')
    clearInput()
    formDisplay('show')
    searchBar.focus()
})

searchOverlay.addEventListener('click', () => {
    overlayDisplay('hide')
    formDisplay('hide')
    hideBothCards()
})

//Real time validation
searchBar.addEventListener(('input'), ()=>{
    hideBothCards()
    flag = false
    if(searchBar.value == ''){
        validationMessage.textContent= 'Enter somthing'
    }else if(searchBar.value.search(/[^a-zA-Z]/g) != -1){
        validationMessage.textContent= 'Letters without space only'
    }else if(searchBar.value.length > 10){
        validationMessage.textContent= 'Length is too long'
    }else{
        validationMessage.textContent= ''
        flag = true
    }
})

//Work on submit when flag is true
searchForm.addEventListener('submit', (e) => {
    e.preventDefault()
    if(searchBar.value == ''){
        validationMessage.textContent= 'Enter somthing'
        return;
    }
    if(flag == true) fetchStockDetails()
})

function fetchStockDetails(){
    showLoader()
    hideBothCards()
    symbol = searchBar.value.trim().toUpperCase();
    fetch(`https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}`)
    .then((response) => response.json())
    .then((data)=>{
        if(Object.keys(data).length == 0 || Object.keys(data).length == 1 || data.c == 0){
            hideBothCards()
            hideLoader()
            showcard(notFoundCard)
        }
        else{
            stockPrice.textContent = (data.c).toFixed(2)
            fetch(`https://finnhub.io/api/v1/stock/profile2?symbol=${symbol}&token=${apiKey}`)
            .then((response) => response.json())
            .then((data)=>{
                if(Object.keys(data).length == 0 || Object.keys(data).length == 1){
                    hideBothCards()
                    hideLoader()
                    showcard(notFoundCard)
                }else{
                    stockImage.src = data.logo;
                    stockSymbol.textContent = data.ticker
                    stockImage.addEventListener('load',()=>{
                        hideLoader()
                        hideBothCards()
                        showcard(stockInfoCard)
                        quantityInCard.focus()
                    });
                }
            })
        }
    })
}


//==================Buy Feature====================
const buyCardBtn = document.getElementById('buyCardBtn')
const buyForm = document.getElementById('buyForm')
// const quantityInCard = document.getElementById('quantityInCard')
const cardValidationMessage = document.getElementById('cardValidationMessage')
const totalAmount = document.getElementById('totalAmount')

//These will be used for messages from the server
const trueMsgbox = document.getElementById('trueMessageBox')
const falseMsgbox = document.getElementById('falseMessageBox')

function quantityValidationMessage(message){
    cardValidationMessage.textContent = message
}

quantityInCard.addEventListener('input', ()=>{
    //removing any validation message
    quantityValidationMessage('')
    //showing the total amount which is quantity + curr price
    totalAmount.innerText = (Number(quantityInCard.value) * Number(stockPrice.innerText)).toFixed(2)
})

buyForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    //checking for empty and -ve quantity
    if(quantityInCard.value == ''){
        quantityValidationMessage('Enter Quantity !')
    }else{
        let quantity = Number(quantityInCard.value)
        if(quantity < 1){
            quantityValidationMessage('Quantity must be > 0')
        }else{
            let buySymbol = stockSymbol.innerText
            let currPrice = Number(stockPrice.innerText)
            let buyQuantity = quantity
            console.log(buySymbol,currPrice,buyQuantity)
            buyAjaxReq(buySymbol,currPrice,buyQuantity)
        }
    }
})

function showServerMessage(status,message){
    if(status == true){
        trueMsgbox.style.display = 'block';
        trueMsgbox.textContent = message;
        setTimeout(() => {
            trueMsgbox.style.display = 'none';
        }, 4000);
    }else{
        falseMsgbox.style.display = 'block';
        falseMsgbox.textContent = message;
        setTimeout(() => {
            falseMsgbox.style.display = 'none';
        }, 4000);

    }
}

function buyAjaxReq(symbol, currPrice, quantity){
    const xhr = new XMLHttpRequest()

    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const response = JSON.parse(xhr.responseText)
            showServerMessage(response.status, response.message)
            if(response.status == true){
                setTimeout(() => {
                    window.location.reload()
                }, 800);
            }
        }
    }
    xhr.open('POST', 'api/buy_api.php')
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`symbol=${symbol}&currPrice=${currPrice}&quantity=${quantity}`)
}

//====================Fetch and display holdings to sell Feature============================

const sellContainer = document.getElementById('sellContainer')

fetchStocksAjaxReq()

function fetchStocksAjaxReq(){
    const xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const response = JSON.parse(xhr.responseText)
            if(response.status == false){
                sellContainer.innerText = response.message
            }else{
                //response.message here is object of {symbol : quantity} coming from server
                displayStocks(response.message)
            }
        }
    }
    xhr.open('GET', 'api/fetch_user_stocks.php')
    xhr.send()
}


function displayStocks(stockList){
    function element(symbol, quantity){
        return (
        `
        <div class="row flex items-center justify-between border-y px-3 sm:px-8 py-1">
            <div class="font-medium">${symbol}</div>
            <div class="flex row items-center gap-5 md:gap-20">
               <div class="font-medium">${quantity}</div>
               <button class="sellBtn make-btn bg-red-600 text-white">Sell</button>
            </div>
        </div>
        `
        )
    }
    for (const symbol in stockList) {
        sellContainer.innerHTML += element(symbol, stockList[symbol])
    }
}

//====================Sell Feature============================
// Because my buttons are added dynamically thats why js cannot fetch them, there is another way
// const buttons = document.querySelectorAll('.sellBtn')

const sellCard = document.getElementById('sellCard')
const sellCardSymbol = document.getElementById('sellCardSymbol')
const sellCardCurrPrice = document.getElementById('sellCardCurrPrice')
const sellCardPurPrice = document.getElementById('sellCardPurPrice')
const sellCardQuantity = document.getElementById('SellCardQuantity')
const sellForm = document.getElementById('sellForm')
const sellCardQuantityInput = document.getElementById('sellCardQuantityInput')
const sellCardTotalAmount = document.getElementById('sellCardTotalAmount')
const sellCardMsg = document.getElementById('sellCardValidationMessage')

const sellOverlay = document.getElementById('sellOverlay')


//Checking if I am clicking on sell button
document.addEventListener('click',(e) => {
    if(e.target.classList.contains('sellBtn')){
        const sym = e.target.parentElement.previousElementSibling.innerText
        const qty = e.target.previousElementSibling.innerText
        sellCardSymbol.innerText = sym
        sellCardQuantity.innerText = qty
        fetchPurPrice(sym)
        fetchCurrPrice(sym)
        sellCardQuantityInput.focus()
    }
})


function fetchCurrPrice(symbol){
    fetch(`https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}`)
    .then((response) => response.json())
    .then((data)=>{
        if(Object.keys(data).length == 0 || Object.keys(data).length == 1 || data.c == 0){
            sellCardCurrPrice.innerText = '- -'
            showSellCard()
            showSellOverlay()
        }
        else{
            const curPrice = Number(data.c).toFixed(2)
            sellCardCurrPrice.innerText = curPrice
            showSellCard()
            showSellOverlay()
        }
    })
}

function fetchPurPrice(symbol){
    const xhr = new XMLHttpRequest()

    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const response = JSON.parse(xhr.responseText)
            sellCardPurPrice.innerText = Number(response.message).toFixed(2)
        }
    }
    xhr.open('POST', 'api/fetch_purchased_price.php')
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    xhr.send(`symbol=${symbol}`)
}

function showSellCard(){
    sellCard.style.scale = "1"
}

function hideSellCard(){
    sellCard.style.scale = "0"
}

function showSellOverlay(){
    sellOverlay.style.display = "block"
}

function hideSellOverlay(){
    sellOverlay.style.display = "none"
}
function sellCardValidationMsg(message){
    sellCardMsg.textContent = message
}

sellOverlay.addEventListener('click',()=>{
    hideSellOverlay()
    hideSellCard()
})
sellCardQuantityInput.addEventListener('input', () =>{
    sellCardValidationMsg('')
    sellCardTotalAmount.innerText = (Number(sellCardQuantityInput.value) * Number(sellCardCurrPrice.innerText)).toFixed(2)
})

sellForm.addEventListener('submit',(e) => {
    e.preventDefault()
    const availabeQty = Number(sellCardQuantity.innerText)
    //checking for empty and -ve quantity
    if(sellCardQuantityInput.value == ''){
        sellCardValidationMsg('Enter Quantity !')
    }else{
        let inputQuantity = Number(sellCardQuantityInput.value)
        if(inputQuantity < 1 || inputQuantity > availabeQty){
            sellCardValidationMsg('Invalid Quantity !')
        }else{
            let sellSymbol = sellCardSymbol.innerText
            let currPrice= Number(sellCardCurrPrice.innerText)
            let sellQuantity = Number(sellCardQuantityInput.value)
            sellAjaxReq(sellSymbol,currPrice,sellQuantity)
        }
    }
})

function sellAjaxReq(symbol, currPrice, quantity){
    const xhr = new XMLHttpRequest()
    
    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const response = JSON.parse(xhr.responseText)
            showServerMessage(response.status, response.message)
            if(response.status == true){
                setTimeout(() => {
                    window.location.reload()
                }, 800);
            }
            console.log(response)
        }
    }
    xhr.open('POST', 'api/sell_api.php')
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    xhr.send(`symbol=${symbol}&currPrice=${currPrice}&quantity=${quantity}`)
}

