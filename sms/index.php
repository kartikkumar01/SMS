<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to SMS</title>
    <?php include('include/head-links.php'); ?>
</head>

<body class="dark:bg-hsecondary-dark dark:text-text-dark text-body-desktop">

    <?php include('include/header.php'); ?>

    <main>

        <!-- landing section starts -->
        <div class="flex flex-col lg:flex-row">
            <img  class="max-w-[500px] w-[90%] mx-auto mt-5" src="img/banda.svg" alt="">
            <div>
                <h1 class="dark:text-[#d1d0d0] text-[#44475B] font-[500] mt-10 sm:mt-17 sm:text-[96px]  text-heading-desktop w-[95%] mx-auto text-center leading-[40px] sm:leading-[96px]">Learn Investing <br> Easily, right here.</h1>
                <p class="dark:text-[#d1d0d0] text-[#44475B] font-[500] mt-2 sm:mt-5 sm:text-[30px] text-body-desktop w-[60%] sm:w-[90%] mx-auto text-center sm:leading-[60px]">Just one step and your are ready..</p>
                <a href="signup.php" class="w-fit make-btn bg-green-600 text-gray-100 block mx-auto my-5">Get Started</a>
            </div>
        </div>
        <!-- ------landing section ends-------- -->


        <!-- search any stock feature -->
         <h2>Search Any Stock here</h2>
         <form method="GET" action="#" class="border w-[95%] m-auto max-w-[300px] p-3 flex rounded-sm justify-between">
           <input type="search" placeholder="Search Ex- AAPL" class="outline-none w-full">
           <button class="cursor-pointer"><i class="fa-solid fa-search"></i></button>
         </form>

         <!-- search popup -->
         <div class="border w-[150px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm">
            <p>AAPL</p>
            <p>Apple co.in</p>
            <p>$150.44</p>
            <button type="button" class="bg-red-600 text-white make-btn">Close</button>
         </div>
         <div class="text-center border w-[150px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm">
            <p>No Stock Found!!</p>
            <button type="button" class="bg-red-600 text-white make-btn">Close</button>
         </div>

        <!-- description section -->
         <h1>Description comes here</h1>

    </main>

    <?php include('include/footer.php'); ?>
</body>

</html>