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

const searchForm = document.getElementById('searchForm')
const searchBar = document.getElementById('searchBar')
const searchStockBtn = document.getElementById('searchStockBtn')
const searchOverlay = document.getElementById('searchOverlay')

function overlay(value){
    switch(value){
        case 'show' : searchOverlay.style.display = 'block'
        break
        case 'hide' :  searchOverlay.style.display = 'none'
    }
}
function form(value){
    switch(value){
        case 'show' : searchForm.style.scale = 1
        break
        case 'hide' :  searchForm.style.scale = 0
    }
}
searchStockBtn.addEventListener('click', () => {
    overlay('show')
    form('show')
    searchBar.focus()
})
searchOverlay.addEventListener('click', () => {
    overlay('hide')
    form('hide')
})

searchForm.addEventListener('submit', (e) => {
    e.preventDefault()
    console.log(searchBar.value)
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