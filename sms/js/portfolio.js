//------FETCHING OF BATCH STOCKS CODE IS TAKEN FROM CHAT GPT--------

const portfolioContainer = document.getElementById('portfolioContainer')
const totalInvestedInBox = document.getElementById('totalInvestedAmount')
const totalCurrentInBox = document.getElementById('totalCurrentValue')
const totalProfitAndLosInBox = document.getElementById('totalProfitAndLoss')

fetchPortfolioAjaxReq()

function fetchPortfolioAjaxReq(){
    const xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const response = JSON.parse(xhr.responseText)
            if(response.status == false){
                totalInvestedInBox.innerText = 0
                totalCurrentInBox.innerText = 0
                totalProfitAndLosInBox.innerText = 0
                portfolioContainer.innerHTML  = `<p class="text-center">${response.message}</p>`;

            }else{
                //response.message here is array[] of objects coming from server
                const portfolio = response.message
                const symbolsList = fetchSymbolsFromPortfolio(portfolio)

                //The results will come in the order in which the list is sent
                fetchPortfolioPrices(symbolsList).then(curPrice => {
                    //Adds the current price in the portfolio
                    displayPortfolio(portfolio, curPrice)
                })
            }
        }
    }
    xhr.open('GET', 'api/fetch_portfolio_details.php')
    xhr.send()
}

function fetchSymbolsFromPortfolio(ArrayOfObjects){
    const symbolsList = []
    for (const Object of ArrayOfObjects) {
        symbolsList.push(Object.symbol)
    }
    return symbolsList
}
function giveSign(value, addPercentageSymbol = false){
    if(addPercentageSymbol == true){
        if(value > 0){
            return `<span class="text-green-600">+${value.toFixed(2)}%</span>`
        }else{
            return `<span class="text-red-600">${value.toFixed(2)}%</span>`
        }
    }else{
        if(value > 0){
            return `<span class="text-green-600">+${value.toFixed(2)}</span>`
        }else{
            return `<span class="text-red-600">${value.toFixed(2)}</span>`
        }
    }
}

function portfolioElement(portfolioObject, curPriceObject){
    function percentageChange(oldValue, newValue) {
        const value = ((newValue - oldValue) / oldValue) * 100
        return Math.round(value * 100) / 100
    }
    const symbol = portfolioObject.symbol
    const quantity = Number(portfolioObject.quantity)
    const invested_amount = Number(portfolioObject.invested_amount)
    const average_price = invested_amount / quantity
    const curPrice = Number(curPriceObject.price)
    const total_cur_price = quantity * curPrice
    const interestRate = percentageChange(average_price, curPrice)
    const priceDifference = total_cur_price - invested_amount

        return (`
            <div class="row flex justify-between border-y py-2 px-4 sm:p-4">
                <div>
                    <div>${quantity} Qty. Avg. ${average_price.toFixed(2)}</div>
                    <div class="font-bold">${symbol}</div>
                    <div>Invested ${invested_amount.toFixed(2)}</div>
                </div>
                <div class="text-right">
                    <div>${giveSign(interestRate,true)}</div>
                    <div>${giveSign(priceDifference)}</div>
                    <div>LTP ${curPrice.toFixed(2)}</div>
                </div>
            </div>
        `)
}
function displayPortfolio(portfolioList, curPrice){
    let totalInvestedAmount = 0 
    let totalCurrentValue = 0
    let i = 0
    for (const portfolio of portfolioList) {
        portfolioContainer.innerHTML += portfolioElement(portfolio, curPrice[i])
        totalInvestedAmount += Number(portfolio.invested_amount)
        totalCurrentValue += Number(curPrice[i].price * portfolio.quantity)
        i++
    }
    const profitAndLoss = totalCurrentValue - totalInvestedAmount
    totalInvestedInBox.innerText = totalInvestedAmount.toFixed(2)
    totalCurrentInBox.innerText = totalCurrentValue.toFixed(2)
    totalProfitAndLosInBox.innerHTML  = giveSign(totalCurrentValue - totalInvestedAmount)
}

async function fetchStockPrice(symbol) {
    const apiKey = "cvijhvhr01qks9qat1u0cvijhvhr01qks9qat1ug"; // Replace with your actual API key
    const url = `https://finnhub.io/api/v1/quote?symbol=${symbol}&token=${apiKey}`;

    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error(`Failed to fetch ${symbol}`);

        const data = await response.json();
        return { symbol, price: data.c }; // 'c' is the current price
    } catch (error) {
        console.error(`Error fetching ${symbol}:`, error);
        return { symbol, price: null };
    }
}

async function fetchPortfolioPrices(stockSymbols) {
    const pricePromises = stockSymbols.map(symbol => fetchStockPrice(symbol));
    const stockPrices = await Promise.all(pricePromises);
    return stockPrices;
}




    
