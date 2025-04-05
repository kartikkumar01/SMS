<?php
session_start();
include('include/login_required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sell or Buy</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/sell_buy.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <?php include('include/messageBoxes.php'); ?>

    <!-- Loader which appears while fetching the data from the finnhub api -->
   <div id="loader" class="z-[500] loader fixed top-[50%] left-[50%] translate-[-50%]"></div>

    <main>
       <h1 class="px-2 text-center md:text-5xl text-2xl my-5 font-bold">Buy or Sell any stock <i class="text-green-500 fa-solid fa-money-bill-transfer"></i></h1>
       <p class="rounded py-3 text-center w-[95%] mx-auto my-3 max-w-[300px] "><span class="font-semibold">Your Balance</span> : <span id="balance1"></span></p>
       <button id="searchStockBtn" type="button" class="make-btn bg-green-600 text-white m-auto block">Buy Stock</button>

      <div id="searchOverlay" class="hidden fixed bg-[#00000075] top-0 left-0 right-0 bottom-0 backdrop-blur-xs"></div>

      <form id="searchForm" class="scale-0 border duration-500 transition-all pr-4 rounded-full flex fixed z-50 top-[5%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
         <input id="searchBar" autocomplete="off" autofocus placeholder="Search Ex- AAPL" class="rounded-full outline-none py-2 w-[200px] text-center">
         <button class="cursor-pointer"><i class="fa-solid fa-search"></i></button>
         <p id="validationMessage" class="rounded-sm text-white bg-red-600 absolute top-[-60%] left-[5%] text-sm"></p>
      </form>

         <!-- popup if found-->         
         <div id="stockInfoCard" class="scale-0 transition-all flex shadow-box-light dark:shadow-box-dark w-[70%] max-w-[250px] flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[15%] md:top-[25%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <p class="text-xs md:text-sm rounded text-center w-[95%] mx-auto max-w-[300px] "><span class="font-semibold">Your Balance</span> : <span id="balance2"></span></p>
            <img id="stockImage" src="" alt="stock image" class="rounded-full block w-[50%] m-auto" >
            <p id="stockSymbol" class="text-center"></p>
            <p class="text-center font-bold">Curr : $<span  id="stockPrice"></span></p>

            <form id="buyForm">
               <input id="quantityInCard" type="number" placeholder="Quantity" class="w-full text-center border">
               <p class="text-center">Total : $<span id="totalAmount">0.00</span></p>
               <!-- BUY BUTTON -->
               <button id="buyCardBtn" type="submit" class="bg-green-600 text-white make-btn mx-auto block my-3">Buy</button>
            </form>
            <!-- This is for displaying error messages -->
            <p id="cardValidationMessage" class="rounded-sm text-white bg-red-600 absolute top-[-5%] left-[50%] translate-x-[-50%] w-max text-center text-sm md:text-lg"></p>
         </div>

         <!-- popup if NOT found-->
         <div id="notFoundCard" class="scale-0 shadow-box-light dark:shadow-box-dark transition-all text-center w-[150px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[35%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <p>No Stock Found!!</p>
         </div>

         <h2 class="text-2xl md:text-4xl font-bold text-center mt-10 mb-5 px-3">Sell From your Holdings</h2>
         <div id="sellContainer" class="w-[85%] max-w-[600px] m-auto text-center">
            <!-- Stocks list will come over here through Javascript -->
         </div>

         <!-- popup if user clicks on sell -->
         <div id="sellCard" class="z-50 scale-0 transition-all flex shadow-box-light dark:shadow-box-dark w-[70%] max-w-[250px] flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[15%] md:top-[25%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <p id="sellCardSymbol" class="font-bold text-center"></p>
            <p class="text-center">Curr : $<span  id="sellCardCurrPrice">150</span></p>
            <!-- Here purchase price will be the average of total amount invested / no of stocks purchased -->
            <p class="text-center">Pur : $<span  id="sellCardPurPrice">160</span></p>
            <p class="text-center">Quantity : <span  id="SellCardQuantity"></span></p>
            <form id="sellForm">
               <input id="sellCardQuantityInput" type="number" placeholder="Sell Quantity" class="w-full text-center border">
               <p class="text-center">Total : $<span id="sellCardTotalAmount">0.00</span></p>
               <button id="sellCardBtn" type="submit" class="bg-red-600 text-white make-btn mx-auto block my-3">Sell</button>
            </form>
            <p id="sellCardValidationMessage" class="rounded-sm text-white bg-red-600 absolute top-[-5%] left-[50%] translate-x-[-50%] w-max text-center text-sm md:text-lg"></p>
         </div>
         <div id="sellOverlay" class="hidden fixed bg-[#00000075] top-0 left-0 right-0 bottom-0 backdrop-blur-xs"></div>


    </main>
    <?php include("include/footer.php"); ?>
</body>
</html>