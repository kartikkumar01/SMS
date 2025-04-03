const transactionParentContainer = document.getElementById('transactionParentContainer')
const transactionContainer = document.getElementById('transactionContainer')

fetchTransactionsAjaxReq()

function fetchTransactionsAjaxReq(){
    const xhr = new XMLHttpRequest()
    xhr.onreadystatechange = () => {
        if(xhr.readyState == xhr.DONE && xhr.status == 200){
            const response = JSON.parse(xhr.responseText)
            if(response.status == false){
                transactionParentContainer.innerText = response.message;
            }else{
                //response.message here is array[] of objects coming from server
                displayTransactions(response.message)
            }
        }
    }
    xhr.open('GET', 'api/fetch_transactions.php')
    xhr.send()
}
function transactionElement(transaction,srno){
    const date = new Date(`${transaction.transaction_time}`).toLocaleDateString()
    const time = new Date(`${transaction.transaction_time}`).toLocaleTimeString()
    if(transaction.transaction_type == 'Buy'){
        return (`
        <tr>
            <td class="hidden sm:table-cell">${srno}</td>
            <td>${transaction.symbol}</td>
            <td class="hidden sm:table-cell">${date}</td>
            <td class="hidden sm:table-cell">${time}</td>
            <td class="text-green-600 font-bold">+${transaction.quantity}</td>
            <td>$${transaction.price_per_share}</td>
            <td>$${transaction.transaction_amount}</td>
        </tr>
        `)
    }else{
        return (`
        <tr>
            <td class="hidden sm:table-cell">${srno}</td>
            <td>${transaction.symbol}</td>
            <td class="hidden sm:table-cell">${date}</td>
            <td class="hidden sm:table-cell">${time}</td>
            <td class="text-red-600 font-bold">-${transaction.quantity}</td>
            <td>$${transaction.price_per_share}</td>
            <td>$${transaction.transaction_amount}</td>
        </tr>
            `)
    }
}
function displayTransactions(transactionListArray){
    let i = 1
    for (const transactionObject of transactionListArray) {
        transactionContainer.innerHTML += transactionElement(transactionObject,i)
        ++i
    }
}