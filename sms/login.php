<?php
session_start();
include('include/redirect_if_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Login</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/stockSearchFeature.js" defer></script>
    <link rel="stylesheet" href="css/form.css">
    <script src="js/showHidePassword.js" defer></script>
    <script src="js/login.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <?php include('include/stocks-search-feature.php'); ?>
    <main >
        <?php include('include/messageBoxes.php'); ?>
        <div id="loginOverlay" class="fixed bg-[#00000079] top-0 left-0 right-0 bottom-0 hidden"></div>
        <form id="loginForm" class="w-[90%] py-2 px-5 shadow-box-light dark:shadow-box-dark transition  mt-5 rounded-lg  max-w-[500px] mx-auto flex flex-col p-2 gap-6 md:px-7 ">
            <h1 class="text-center text-xl font-semibold my-5">Login Here <i class="fa-solid fa-sign-in"></i></h1>
            <input name="username" autofocus type="text" id="username" placeholder="username" class="border rounded-sm focus:outline-2 focus:border-transparent outline-primary-light">
            <div class="border flex items-center pr-2 rounded-sm focus-within:outline-2 focus-within:border-transparent outline-primary-light">
                <input name="password"  autocomplete="off" id="password" id="password" type="password" placeholder="password" class="w-full outline-none">
                <i id="showHidePasswordBtn" class="cursor-pointer fa-solid fa-eye-slash"></i>
            </div>
            <div id="clientValidationError" class="m-0 text-white bg-red-500 text-center text-body-mobile"></div>
            <button class="make-btn bg-green-600 text-gray-100 block mx-auto">Log in</button>
            <a href="signup.php" class="text-center block underline text-link">Sign up ?</a>
        </form>
    </main>
    <?php include("include/footer.php"); ?>
</body>

</html>