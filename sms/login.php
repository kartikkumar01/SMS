<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Login</title>
    <?php include("include/head-links.php"); ?>
    <link rel="stylesheet" href="css/form.css">
    <script src="js/form.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <main >
        
    <form class="shadow-[0_4px_10px_rgba(0,0,0,0.1),0_2px_4px_rgba(0,0,0,0.06)] 
        dark:shadow-[0_4px_15px_rgba(0,0,0,0.6),0_2px_6px_rgba(0,0,0,0.3)] transition  mt-5 rounded-lg w-[95%] max-w-[500px] mx-auto flex flex-col p-2 gap-6 md:px-7 ">
        <h1 class="text-center text-xl font-semibold my-5">Login Here <i class="fa-solid fa-sign-in"></i></h1>
        <input type="text" placeholder="username" class="border rounded-sm focus:outline-2 focus:border-transparent outline-primary-light">
        <div class="border flex items-center pr-2 rounded-sm focus-within:outline-2 focus-within:border-transparent outline-primary-light">
            <input id="password" type="password" placeholder="password" class="w-full outline-none">
            <i id="showHidePasswordBtn" class="cursor-pointer fa-solid fa-eye-slash"></i>
        </div>
        <button class="make-btn bg-green-600 text-gray-100 block mx-auto my-5">Log in</button>
        <a href="signup.php" class="text-center block underline text-link mb-5">Sign up ?</a>
    </form>
    </main>
    <?php include("include/footer.php"); ?>
</body>

</html>