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
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include("include/header.php"); ?>
    <main>
       <h1 class="px-2 text-center md:text-5xl text-2xl my-5 font-bold">Sell Or Buy any stock <i class="text-green-500 fa-solid fa-money-bill-transfer"></i></h1>
       <p class="rounded py-3 text-center w-[95%] mx-auto my-3 max-w-[300px] "><span class="font-semibold">Your Balance</span> : <span id="balance"></span></p>
       <button id="searchStockBtn" type="button" class="make-btn bg-primary-dark text-white m-auto block">Search Stock</button>

      <div id="searchOverlay" class="hidden fixed bg-[#00000075] top-0 left-0 right-0 bottom-0 backdrop-blur-xs"></div>
      <form id="searchForm" class="scale-0 border duration-500 transition-all pr-2 rounded-full flex fixed z-50 top-[20%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
         <input id="searchBar" autocomplete="off" autofocus placeholder="Search Ex- AAPL" class="rounded-full outline-none py-2 w-[200px] text-center">
         <button class="cursor-pointer"><i class="fa-solid fa-search"></i></button>
      </form>

         <!-- popup if found-->         
         <div id="stockInfoCard" class="scale-0 transition-all flex shadow-box-light dark:shadow-box-dark w-[70%] max-w-[250px] flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[35%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <img id="stockImage" src="" alt="stock image" class="rounded-full block w-[50%] m-auto" >
            <p id="stockSymbol" class="text-center"></p>
            <p class="text-center font-bold">$<span  id="stockPrice"></span></p>
            <input type="number" placeholder="Quantity" class="w-full text-center border">
            <button type="button" class="bg-green-600 text-white make-btn">Buy</button>
         </div>

         <!-- popup if NOT found-->
         <div id="notFoundCard" class="scale-0 shadow-box-light dark:shadow-box-dark transition-all text-center w-[150px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[35%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <p>No Stock Found!!</p>
         </div>

         <h2 class="font-bold text-center mt-10 mb-5">Buy/Sell From your Holdings</h2>
         <div class="w-[95%] max-w-[600px] m-auto">
            <!-- individual row -->
            <!-- <div class="row flex items-center justify-between border-y px-3 sm:px-8 py-1">
                 <div class="font-medium">AAPL</div>
                 <div>
                    <button class="make-btn bg-green-600 text-white">Buy</button>
                    <button class="make-btn bg-red-600 text-white">Sell</button>
                  </div>
            </div>
            <div class="row flex items-center justify-between border-y px-3 sm:px-8 py-1">
                 <div class="font-medium">TESL</div>
                 <div>
                    <button class="make-btn bg-green-600 text-white">Buy</button>
                    <button class="make-btn bg-red-600 text-white">Sell</button>
                  </div>
            </div>
            <div class="row flex items-center justify-between border-y px-3 sm:px-8 py-1">
                 <div class="font-medium">ALPHABET</div>
                 <div>
                    <button class="make-btn bg-green-600 text-white">Buy</button>
                    <button class="make-btn bg-red-600 text-white">Sell</button>
                  </div>
            </div>
            <div class="row flex items-center justify-between border-y px-3 sm:px-8 py-1">
                 <div class="font-medium">FORD</div>
                 <div>
                    <button class="make-btn bg-green-600 text-white">Buy</button>
                    <button class="make-btn bg-red-600 text-white">Sell</button>
                  </div>
            </div> -->
         </div>

         <!-- popup if user clicks on sell -->
         <div class=" hidden border w-[95%] m-auto max-w-[250px] flex-col items-center justify-center gap-2 p-4 rounded-sm">
            <i class="fa-solid fa-window-close ml-auto"></i>
            <p>AAPL</p>
            <p>Apple co.in</p>
            <p>Curr : $150.44</p>
            <p>Pur : $123.76</p>
            <p>Available : 5</p>
            <input type="number" placeholder="Quantity" class="w-full text-center border">
            <button type="button" class="bg-red-600 text-white make-btn">Sell</button>
         </div>
    </main>
    <?php include("include/footer.php"); ?>
</body>
</html>