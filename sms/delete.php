<?php
session_start();
include('include/login_required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Delete Account</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/stockSearchFeature.js" defer></script>
    <link rel="stylesheet" href="css/form.css">
    <script src="js/showHidePassword.js" defer></script>
    <script src="js/delete.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <?php include('include/stocks-search-feature.php'); ?>
    <main >
        <?php include('include/messageBoxes.php'); ?>
        <div id="deleteOverlay" class="fixed bg-[#00000079] top-0 left-0 right-0 bottom-0 hidden"></div>
        <form id="deleteForm" class="shadow-box-light dark:shadow-box-dark transition  mt-5 rounded-lg w-[95%] max-w-[500px] mx-auto flex flex-col p-2 gap-6 md:px-7 ">
            <h1 class="text-center text-xl font-semibold mt-5">Delete Your Account Permanantly <i class="fa-solid fa-trash"></i></h1>
            <p class="text-center text-red-700 dark:text-red-500 font-semibold mb-5">NOTE: This action is irreversible!!</p>
            <input id="username" autofocus name="username" type="text" placeholder="username" class="border rounded-sm focus:outline-2 focus:border-transparent outline-primary-light">
            <div class="border flex items-center pr-2 rounded-sm focus-within:outline-2 focus-within:border-transparent outline-primary-light">
                <input id="password" autocomplete="off" name="password" type="password" placeholder="password" class="w-full outline-none">
                <i id="showHidePasswordBtn" class="cursor-pointer fa-solid fa-eye-slash"></i>
            </div>
            <div id="clientValidationError" class="m-0 text-white bg-red-500 text-center text-body-mobile"></div>
            <button class="make-btn bg-red-600 block mx-auto my-5 text-gray-100">Delete Account</button>
    </form>
    </main>
    <?php include("include/footer.php"); ?>
</body>

</html>