<?php
session_start();
include('include/redirect_if_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - SignUp</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/stockSearchFeature.js" defer></script>
    <link rel="stylesheet" href="css/form.css">
    <script src="js/showHidePassword.js" defer></script>
    <script src="js/signup.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <?php include('include/stocks-search-feature.php'); ?>
<main>
    <?php include('include/messageBoxes.php'); ?>
    <div id="signupOverlay" class="fixed bg-[#00000079] top-0 left-0 right-0 bottom-0 hidden"></div>
    <form id="signupForm" class="shadow-box-light dark:shadow-box-dark transition  mt-5 rounded-lg  max-w-[500px] mx-auto flex flex-col w-[90%] py-2 px-5 gap-6 md:px-7 ">
        <h1 class="text-center text-xl font-semibold my-3">Sign Up on SMS <i class="fa-solid fa-database"></i></h1>
        <input type="text" autofocus id="fullname" name="fullname" placeholder="Full Name" class="border rounded-sm focus:outline-2 focus:border-transparent outline-primary-light">
        <input type="text" id="username" name="username" placeholder="username" class="border rounded-sm focus:outline-2 focus:border-transparent outline-primary-light">
        <div class="border flex items-center pr-2 rounded-sm focus-within:outline-2 focus-within:border-transparent outline-primary-light">
            <input id="password"  autocomplete="off" name="password" type="password" placeholder="password" class="w-full outline-none">
            <i id="showHidePasswordBtn" class="cursor-pointer fa-solid fa-eye-slash"></i>
        </div>
        <input type="password" id="confirmPassword"  autocomplete="off" placeholder="confirm password" class="border rounded-sm focus:outline-2 focus:border-transparent outline-primary-light">
        <fieldset class="border rounded-sm">
            <legend class="text-sm md:text-lg">Choose to get personalized experience</legend>
            <label for="beginner">
                <input type="radio" value="beginner" name="prior_experience" id="beginner">
                <p>Beginner</p>
            </label>
            <label for="intermediate">
                <input type="radio" value="intermediate" name="prior_experience" checked id="intermediate">
                <p>Intermediate</p>
            </label>
            <label for="advanced">
                <input type="radio" value="advanced" name="prior_experience" id="advanced">
                <p>Advanced</p>
            </label>
        </fieldset>
        <div id="clientValidationError" class="m-0 text-white bg-red-500 text-center text-body-mobile"></div>
        <button id="signupBtn" class="make-btn bg-green-600 text-gray-100 block mx-auto">Sign up</button>
        <a href="login.php" class="text-center block underline text-link mb-5">Log In ?</a>
    </form>

</main>

    <?php include("include/footer.php"); ?>
</body>

</html>