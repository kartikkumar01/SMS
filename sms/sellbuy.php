<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sell or Buy</title>
    <?php include("include/head-links.php"); ?>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include("include/header.php"); ?>
    <main>
      <p class="rounded border py-3 text-center w-[95%] m-auto max-w-[300px] ">Your Balance : $3,465</p>
    <h1>Sell Or Buy any stock</h1>
         <form method="GET" action="#" class="border w-[95%] m-auto max-w-[300px] p-3 flex rounded-sm justify-between">
           <input type="search" placeholder="Search Ex- AAPL" class="outline-none w-full">
           <button class="cursor-pointer"><i class="fa-solid fa-search"></i></button>
         </form>
         <!-- search popup -->
         <div class="border w-[95%] m-auto max-w-[250px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm">
            <i class="fa-solid fa-window-close ml-auto"></i>
            <p>AAPL</p>
            <p>Apple co.in</p>
            <p>$150.44</p>
            <input type="number" placeholder="Quantity" class="w-full text-center border">
            <button type="button" class="bg-green-600 text-white make-btn">Buy</button>
         </div>
         <div class="text-center border max-w-[150px] m-auto flex flex-col items-center justify-center gap-2 p-4 rounded-sm">
            <p>No Stock Found!!</p>
            <button type="button" class="bg-red-600 text-white make-btn">Close</button>
         </div>

         <h2 class="font-bold text-center">Your Holdings</h2>
         <div class="w-[95%] max-w-[600px] m-auto">
            <!-- individual row -->
            <div class="row flex items-center justify-between border-y px-3 sm:px-8 py-1">
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
            </div>
         </div>
         <div class="border w-[95%] m-auto max-w-[250px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm">
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