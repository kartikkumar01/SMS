<?php
session_start();
include('include/login_required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Portfolio</title>
    <?php include('include/head-links.php') ?>
    <script src="js/portfolio.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include('include/header.php') ?>
    <main>
        <p class="font-semibold text-4xl md:text-5xl text-center my-5 px-2">
            Hi,
            <?php
            echo $_SESSION['fullname'];
            ?>
        </p>
        <h1 class="font-semibold text-3xl text-center my-5">Your Portfolio</h1>

        <!-- box at top -->
        <div class="border w-[95%] max-w-[500px] p-5 mx-auto my-5 rounded">
            <div class="top flex justify-between sm:justify-around">
                <div class="left">
                    <div>Invested</div>
                    <div id="totalInvestedAmount"></div>
                </div>
                <div class="right">
                    <div>Current</div>
                    <div id="totalCurrentValue"></div>
                </div>
            </div>
            <hr class="my-2">
            <div class="bottom flex justify-between sm:justify-around">
                <div>P&L</div>
                <div id="totalProfitAndLoss" class="font-bold"></div>
            </div>
        </div>

        <!-- holdings rows start here -->
         <div id="portfolioContainer" class="w-[95%] m-auto max-w-[700px]">
           <!-- holdings will come here from javascript -->
         </div>
    </main>
    <?php include('include/footer.php') ?>
</body>
</html>