<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Delete Account</title>
    <link rel="stylesheet" href="css/signup.css">
    <?php include("include/head-links.php"); ?>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include("include/header.php"); ?>
    <main >
    <h1 class="text-center text-xl font-semibold my-5">Delete Your Account Permanantly <i class="fa-solid fa-trash"></i></h1>
    <p class="text-center text-red-700 dark:text-red-500 font-semibold my-5">NOTE: This action is irreversible!!</p>
    <form class="text-text-dark sm:text-xl" >
        <fieldset>
            <legend>Enter your details last time <i class="fa-solid fa-face-frown"></i></legend>
            <div class="flex flex-col make-input-good gap-5 py-2.5">
                <input placeholder="Username" type="text" name="username">
                <input placeholder="Password" type="password" name="password">   
            </div>
        </fieldset>
        <button class="make-btn bg-red-600 block mx-auto my-5">Delete Account</button>
    </form>
    </main>
    <?php include("include/footer.php"); ?>
</body>

</html>