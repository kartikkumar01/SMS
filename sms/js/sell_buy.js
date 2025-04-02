// --------------Fetching balance and displaying it on the page-------------------
const balance = document.getElementById('balance')
const xhr1 = new XMLHttpRequest()
xhr1.onreadystatechange = () => {
    if(xhr1.readyState == xhr1.DONE && xhr1.status == 200){
        const response = JSON.parse(xhr1.responseText)
        if(response.status == true){
            const balanceResponse = Number(response.message).toLocaleString() //convert the balance in comman separated values
            balance.textContent = `$${balanceResponse}`
        }else{
            balance.textContent = `- - - - -`
        }
    }
}
xhr1.open('GET','api/fetch_balance_api.php')
xhr1.send()


// --------------Search API-------------------
const quantityCard = document.getElementById('quantityCard')
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
                        quantityCard.focus()
                    });
                }
            })
        }
    })
}


//Buy Feature
const buyCardBtn = document.getElementById('buyCardBtn')
const buyForm = document.getElementById('buyForm')
// const quantityCard = document.getElementById('quantityCard')
const cardValidationMessage = document.getElementById('cardValidationMessage')
const totalAmount = document.getElementById('totalAmount')

const trueMsgbox = document.getElementById('trueMessageBox')
const falseMsgbox = document.getElementById('falseMessageBox')

function quantityValidationMessage(message){
    cardValidationMessage.textContent = message
}

quantityCard.addEventListener('input', ()=>{
    quantityValidationMessage('')
    totalAmount.innerText = (Number(quantityCard.value) * Number(stockPrice.innerText)).toFixed(2)
})

buyForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    //checking for empty and -ve quantity
    if(quantityCard.value == ''){
        quantityValidationMessage('Enter Quantity !')
    }else{
        let quantity = Number(quantityCard.value)
        if(quantity < 1 || quantity > 10){
            quantityValidationMessage('Quantity must be 1 - 10')
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
        }
    }
    xhr.open('POST', 'api/buy_api.php')
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`symbol=${symbol}&currPrice=${currPrice}&quantity=${quantity}`)
}