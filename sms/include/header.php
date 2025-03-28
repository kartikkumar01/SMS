<header class="text-[25px] md:text-body-desktop bg-bg-light text-text-light dark:bg-secondary-dark dark:text-text-dark sticky top-0">

    <!--Navigations [For Desktop] -->
    <div class="flex items-center justify-between px-5">

        <!-- This is left div for the logo -->
        <div class="flex items-center gap-5">
            <a href="/sms/sms"><img id="logo" src="./img/logo.png" alt="sms logo" class="w-15"></a>
        </div>

        <!-- This is the right side navigations -->
        <nav class="flex items-center gap-4">

        <!-- ----------------------------------------------- -->
        <?php
            if(!isset($_SESSION['user_id'])){
                ?>
                <a href="login.php" class="hidden md:block">Log in</a>
                <a href="signup.php" class="hidden md:block make-btn border hover:bg-green-600 hover:text-white border-green-600 text-green-600 ">Sign up</a>
                <?php
            }
        ?>
        <!-- ----------------------------------------------- -->

        <?php
            if(isset($_SESSION['user_id'])){
                ?>
                <a href="portfolio.php" class="hidden md:block">Portfolio</a>
                <a href="transaction.php" class="hidden md:block">Transactions</a>
                <a href="sellbuy.php" class="cursor-pointer hidden md:block">Buy/Sell</a>
                <?php
            }
        ?>

        <!-- LEARN HEADER OPTION STARTS -->
        <span id="learnBtn" class="cursor-pointer hidden md:block relative">
                Learn <i class="fa-solid fa-angle-down align-middle"></i>
                <nav id="learnList" class="shadow shadow-gray-700 transition-all flex absolute flex-col items-center max-h-0 bg-bg-light overflow-hidden dark:bg-secondary-dark z-10">
                    <a href="articles.php">Articles</a>
                    <a href="quiz.php">Play&nbsp;Quiz</a>
                    <a href="videos.php">Videos</a>
                </nav>
        </span>
        <div id="learnListOverlay" class="fixed top-0 left-0 bottom-0 right-0 hidden bg-transparent"></div>
        <!-- LEARN HEADER OPTION ENDS -->

        <!-- ----------------------------------------------- -->
        <?php
            if(isset($_SESSION['user_id'])){
                ?>
                    <a href="delete.php" class="cursor-pointer hidden md:block make-btn border hover:bg-red-600 hover:text-white md:border-red-700 md:text-red-700 dark:border-red-500 dark:text-red-500">Delete Account</a>
                <?php
            }
        ?>
        <!-- ----------------------------------------------- -->

        <span class="cursor-pointer"><i id="darkLightBtn" class="fa-solid fa-moon"></i></span>

         <!-- ----------------------------------------------- -->   
        <?php
            if(isset($_SESSION['user_id'])){
                ?>
                    <span title="Log out" id="logoutBtn" class="cursor-pointer"><i class="fa-solid fa-sign-out"></i></span>
                <?php
            }
        ?> 
        <!-- ----------------------------------------------- -->

        <span id="hamburgerBtn" class="relative z-50 md:hidden cursor-pointer text-[25px]"><i class="fa-solid fa-bars"></i></span>

        </nav>

    </div>


    <!-- Navigations [For Mobiles] -->
    <nav id="hamburgerList" class="md:hidden z-30 dark:bg-secondary-dark shadow shadow-gray-700 dark:text-text-dark duration-500 transition-all flex-col items-center overflow-hidden max-h-0  gap-2 text-body-desktop flex relative">

        <!-- ------------------------------------- -->
        <?php
            if(!isset($_SESSION['user_id'])){
                ?>
                <a href="login.php">Log in</a>
                <a href="signup.php">Sign up</a>
                <?php
            }
        ?>
        <!-- --------------------------------------- -->

        <!-- ----------------------------------------------- -->
        <?php
            if(isset($_SESSION['user_id'])){
                ?>
                <a href="portfolio.php">Portfolio</a>
                <a href="sellbuy.php">Buy/Sell</a>
                <a href="transaction.php">Transactions</a>
                <?php
            }
        ?>
        <!-- ----------------------------------------------- -->

        <a href="articles.php">Articles</a>
        <a href="quiz.php">Play Quiz</a>
        <a href="videos.php">Videos</a>

        <!-- ----------------------------------------------- -->
        <?php
            if(isset($_SESSION['user_id'])){
                ?>
                <a href="delete.php">Delete Account</a>
                <?php
            }
        ?>
        <!-- ----------------------------------------------- -->
    </nav>

    <div id="hamburgerListOverlay" class="fixed top-0 left-0 bottom-0 right-0 hidden"></div>
        
</header>