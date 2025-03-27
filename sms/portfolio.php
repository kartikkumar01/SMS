<?php
session_start();
include('include/login_required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Portfolio</title>
    <?php include('include/head-links.php') ?>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include('include/header.php') ?>
    <main>
        <h1 class="font-semibold text-3xl text-center my-5">Your Portfolio</h1>

        <div class="border w-[95%] max-w-[500px] p-5 mx-auto my-5 rounded">
            <div class="top flex justify-between sm:justify-around">
                <div class="left">
                    <div>Invested</div>
                    <div>57,028.25</div>
                </div>
                <div class="right">
                    <div>Current</div>
                    <div>65,187.20</div>
                </div>
            </div>
            <hr class="my-2">
            <div class="bottom flex justify-between sm:justify-around">
                <div>P&L</div>
                <div>+45,232.45</div>
            </div>
        </div>

        <!-- holdings rows start here -->
         <div class="w-[95%] m-auto max-w-[700px]">
            <div class="row flex justify-between border-y py-2 px-4 sm:p-4">
                <div>
                    <div>12 Qty. Avg.252.70</div>
                    <div>CCL</div>
                    <div>Invested 3032.35</div>
                </div>
                <div class="text-right">
                    <div>+5.46%</div>
                    <div>+165.65%</div>
                    <div>LTP 266.50</div>
                </div>
            </div>
            <div class="row flex justify-between border-y py-2 px-4 sm:p-4">
                <div>
                    <div>12 Qty. Avg.252.70</div>
                    <div>CCL</div>
                    <div>Invested 3032.35</div>
                </div>
                <div class="text-right">
                    <div>+5.46%</div>
                    <div>+165.65%</div>
                    <div>LTP 266.50</div>
                </div>
            </div>
            <div class="row flex justify-between border-y py-2 px-4  sm:p-4">
                <div>
                    <div>12 Qty. Avg.252.70</div>
                    <div>CCL</div>
                    <div>Invested 3032.35</div>
                </div>
                <div class="text-right">
                    <div>+5.46%</div>
                    <div>+165.65%</div>
                    <div>LTP 266.50</div>
                </div>
            </div>
            <div class="row flex justify-between border-y py-2 px-4  sm:p-4">
                <div>
                    <div>12 Qty. Avg.252.70</div>
                    <div>CCL</div>
                    <div>Invested 3032.35</div>
                </div>
                <div class="text-right">
                    <div>+5.46%</div>
                    <div>+165.65%</div>
                    <div>LTP 266.50</div>
                </div>
            </div>
         </div>
    </main>
    <?php include('include/footer.php') ?>
</body>
</html>