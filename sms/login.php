<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Login</title>
    <link rel="stylesheet" href="css/signup.css">
    <?php include("include/head-links.php"); ?>
</head>
<body class="text-text-light dark:bg-hsecondary-dark dark:text-text-dark p-0.5">
    <?php include("include/header.php"); ?>
    <main >
    <h1 class="text-center text-xl font-semibold my-5">Login Here <i class="fa-solid fa-sign-in"></i></h1>

    <form class="text-text-dark sm:text-xl" >
        <fieldset>
            <legend>Enter Login Details</legend>
            <div class="flex flex-col make-input-good gap-5 py-2.5">
                <input placeholder="Username" type="text" name="username">
                <input placeholder="Password" type="password" name="password">
                <input placeholder="Confirm Password" type="password" name="confirmed-password">   
            </div>
        </fieldset>
        <button class="make-btn bg-green-600 block mx-auto my-5">Login</button>
        <a href="#" class="text-center block underline text-link">Register</a>
        <a href="#" class="text-center block underline text-link">Forgot Password?</a>
    </form>
    </main>
    <?php include("include/footer.php"); ?>
</body>

</html>