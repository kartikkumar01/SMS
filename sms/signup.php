<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - SignUp</title>
    <link rel="stylesheet" href="css/signup.css">
    <?php include("include/head-links.php"); ?>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include("include/header.php"); ?>
    <main >
    <h1 class="text-center text-xl font-semibold my-5">Sign Up on SMS <i class="fa-solid fa-database"></i></h1>

    <form class="text-text-dark sm:text-xl" >
        <fieldset>
            <legend>Personal Details</legend>
            <div class="flex flex-col make-input-good gap-5 py-2.5">
                <input placeholder="Full Name" type="text" name="fullname">
                <input placeholder="Username" type="text" name="username">
                <input placeholder="Password" type="password" name="password">
                <input placeholder="Confirm Password" type="password" name="confirmed-password">   
            </div>
        </fieldset>
        <fieldset>
            <legend>Prior Knowledge</legend>
            <section class="flex flex-col make-radio-good gap-5 py-2.5">
                <label for="beginner">
                    <input type="radio" value="beginner" name="radio" checked id="beginner"> Beginner
                </label>
                <label for="intermediate">
                    <input type="radio" value="intermediate" name="radio" id="intermediate"> Intermediate
                </label>
                <label for="advanced">
                    <input type="radio" value="advanced" name="radio" id="advanced"> Advanced
                </label>
            </section>
        </fieldset>
        <button class="make-btn bg-green-600 block mx-auto my-5">Sign up</button>
        <a href="#" class="text-center block underline text-link">Login</a>
    </form>
    </main>
    <?php include("include/footer.php"); ?>
</body>

</html>