<?php
session_start();
include('include/redirect_if_login.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to SMS</title>

    <!-- CONTAINS ALL THE NECESSARY LINKS -->
    <?php include('include/head-links.php'); ?>

</head>

<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">

    <!-- WEBSITE HEADER -->
    <?php include('include/header.php'); ?>
    <?php include('include/stocks-search-feature.php'); ?>

    <main>
        <!-- ------------LANDING SECTION STARTS--------------- -->
        <div class="flex flex-col lg:flex-row">
            <img class="max-w-[500px] w-[90%] mx-auto" src="img/index/hero.png" alt="landing page stock market image">
            <div>
                <h1 class="dark:text-[#d1d0d0] text-[#44475B] font-[500] sm:mt-17 sm:text-[96px]  text-heading-desktop w-[95%] mx-auto text-center leading-[40px] sm:leading-[96px]">Learn Investing <br> Easily, right here.</h1>
                <p class="dark:text-[#d1d0d0] text-[#44475B] font-[500] mt-2 sm:mt-5 sm:text-subheading-desktop text-body-desktop w-[60%] sm:w-[90%] mx-auto text-center sm:leading-[60px]">Just one step and your are ready..</p>
                <a href="signup.php" class="w-fit make-btn bg-green-600 text-gray-100 block mx-auto my-5">Sign Up</a>
            </div>
        </div>
        <!-- ------------LANDING SECTION ENDS----------------- -->
        
        <!-- ------------REAL EXPERIENCE SECTION STARTS----------------- -->
        <section class="w-[95%] mx-auto my-5">
            <h2 class="text-text-light dark:text-text-dark sm:text-subheading-desktop text-subheading-mobile font-medium mb-2 md:text-heading-desktop md:font-semibold md:text-center">Real Experience</h2>
             <div class="md:flex justify-center gap-30 items-stretch">
                    <article>
                        <p class="md:hidden text-body-desktop"><i class="fa-solid fa-arrow-right"></i> $10,000 Virtual Money</p>
                        <img src="img/index/dollar.png" alt="" class="w-full max-w-[180px] md:max-w-[280px] mx-auto">
                        <p class="font-[500] hidden md:block text-subheading-desktop text-center">$10,000 virtual money</p>
                    </article>
                    <article class="mt-2 md:mt-0 md:flex md:flex-col">
                        <p class="md:hidden mt-4 text-body-desktop md:mt-auto"><i class="fa-solid fa-arrow-right"></i> Invest in Real US stocks</p>
                        <img src="img/index/flag.png" alt="" class="mt-4 w-full max-w-[150px] md:max-w-[250px] mx-auto">
                        <p class="font-[500] hidden md:block text-subheading-desktop mt-4 text-center md:mt-auto">Invest in Real US stocks</p>
                    </article>
                </div>
        </section>
        <!-- ------------REAL EXPERIENCE SECTION ENDS----------------- -->

        <!-- ------------LEARNING EXPERIENCE SECTION ENDS----------------- -->
        <section class="w-[95%] mx-auto my-5">
            <h2 class="text-text-light dark:text-text-dark sm:text-subheading-desktop text-subheading-mobile font-medium mb-2 md:text-heading-desktop md:font-semibold md:text-center md:mt-25">Learning Material</h2>
            <div class="md:flex justify-center gap-10 items-stretch">
                <article class="mt-2 md:mt-0 md:flex md:flex-col">
                    <p class="md:hidden"><i class="fa-solid fa-arrow-right"></i> Read Articles</p>
                    <img src="img/index/article.png" alt="" class="w-[70%] mx-auto max-w-[300px]">
                    <p class="font-[500] hidden md:block text-subheading-desktop mt-4 text-center md:mt-auto">Read Articles</p>
                </article>
                <article class="mt-2 md:mt-0 md:flex md:flex-col">
                    <p class="md:hidden"><i class="fa-solid fa-arrow-right"></i> Watch Videos</p>
                    <img src="img/index/video.png" alt="" class="w-[90%] mx-auto max-w-[350px]">
                    <p class="font-[500] hidden md:block text-subheading-desktop mt-4 text-center md:mt-auto">Watch Videos</p>
                </article>
                <article class="mt-2 md:mt-0 md:flex md:flex-col">
                    <p class="md:hidden"><i class="fa-solid fa-arrow-right"></i> Play Quizes</p>
                    <img src="img/index/quiz.png" alt="" class="w-[70%] mx-auto max-w-[300px]">
                    <p class="font-[500] hidden md:block text-subheading-desktop mt-4 text-center md:mt-auto">Play Quizes</p>
                </article>
            </div>
        </section>
        <!-- ------------LEARNING EXPERIENCE SECTION ENDS----------------- -->

        <!-- SIGNUP NOW SECTION STARTS -->
        <div class="mt-10">
            <p class=" text-center md:text-subheading-desktop text-body-desktop">Open your account, and start practicing</p>
            <a href="signup.php" class="w-fit make-btn bg-green-600 text-gray-100 block mx-auto my-5">Sign Up Now</a>
        </div>
        <!-- SIGNUP NOW SECTION ENDS -->

    </main>

    <!-- WEBSITE FOOTER -->
    <?php include('include/footer.php'); ?>
</body>

</html>