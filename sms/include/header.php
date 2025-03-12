<header class="flex items-center justify-between px-5 text-xl bg-bg-light text-text-light dark:bg-secondary-dark dark:text-text-dark">
        <div>
            <img id="logo" src="./img/logo.png" alt="sms logo" class="w-15">
        </div>
        <nav class="flex items-center gap-4">
            <a href="signup.php" class="hidden sm:block">Sign up</a>
            <a href="portfolio.php" class="hidden sm:block">Portfolio</a>
            <a href="transaction.php" class="hidden sm:block">Transactions</a>
            <span id="learnBtn" class="cursor-pointer hidden sm:block relative">
                Learn <i class="fa-solid fa-angle-down align-middle"></i>
                <nav id="learnList" class="shadow shadow-gray-700 transition-all flex absolute flex-col items-center max-h-0 bg-bg-light overflow-hidden dark:bg-secondary-dark">
                    <a href="articles.php">Articles</a>
                    <a href="quiz.php">Play&nbsp;Quiz</a>
                    <a href="videos.php">Videos</a>
                 </nav>
            </span>
            <a href="sellbuy.php" class="cursor-pointer hidden sm:block">Buy/Sell</a>
            <a href="delete.php" class="cursor-pointer hidden sm:block make-btn border hover:bg-red-600 hover:text-white sm:border-red-700 sm:text-red-700 dark:border-red-500 dark:text-red-500">Delete Account</a>
            <span class="cursor-pointer"><i id="darkLightBtn" class="fa-solid fa-moon"></i></span>
            <span class="cursor-pointer"><i class="fa-solid fa-sign-in"></i></span>
            <span id="hamburgerBtn" class="sm:hidden cursor-pointer"><i class="fa-solid fa-bars"></i></span>
        </nav>
    </header>

    <!-- navigations which will expand on clicking hamburger -->
     <nav id="hamburgerList" class=" dark:bg-secondary-dark shadow shadow-gray-700 dark:text-text-dark transition-all flex flex-col items-center overflow-hidden max-h-0 sm:hidden">
        <a href="signup.php">Sign up</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="sellbuy.php">Buy/Sell</a>
        <a href="transaction.php">Transactions</a>
        <a href="articles.php">Articles</a>
        <a href="quiz.php">Play Quiz</a>
        <a href="videos.php">Videos</a>
        <a href="delete.php">Delete Account</a>
     </nav>