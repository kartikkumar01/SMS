<header class="text-[25px] md:text-body-desktop bg-bg-light text-text-light dark:bg-secondary-dark dark:text-text-dark sticky top-0">
    <div class="flex items-center justify-between px-5">
        <!-- This is left div for the logo -->
        <div class="flex items-center gap-5">
            <a href="/sms/sms"><img id="logo" src="./img/logo.png" alt="mds logo" class="w-15"></a>
            <!-- <div class="border w-fit pr-2 rounded-full hidden md:block">
                <input type="text" class="outline-none py-1 w-[200px] text-center" placeholder="Ex - AAPL">
                <button class="cursor-pointer md:hover:scale-115 transition"><i class="fa-solid fa-search"></i></button>
            </div> -->
        </div>
        <!-- This is the right side navigations     -->
        <nav class="flex items-center gap-4">
            <a href="signup.php" class="hidden md:block">Sign up</a>
            <a href="portfolio.php" class="hidden md:block">Portfolio</a>
            <a href="transaction.php" class="hidden md:block">Transactions</a>

            <span id="learnBtn" class="cursor-pointer hidden md:block relative">
                Learn <i class="fa-solid fa-angle-down align-middle"></i>
                <nav id="learnList" class="shadow shadow-gray-700 transition-all flex absolute flex-col items-center max-h-0 bg-bg-light overflow-hidden dark:bg-secondary-dark z-10">
                    <a href="articles.php">Articles</a>
                    <a href="quiz.php">Play&nbsp;Quiz</a>
                    <a href="videos.php">Videos</a>
                </nav>
            </span>
            <div id="learnListOverlay" class="fixed top-0 left-0 bottom-0 right-0 hidden"></div>
            <a href="sellbuy.php" class="cursor-pointer hidden md:block">Buy/Sell</a>
            <a href="delete.php" class="cursor-pointer hidden md:block make-btn border hover:bg-red-600 hover:text-white md:border-red-700 md:text-red-700 dark:border-red-500 dark:text-red-500">Delete Account</a>
            <span class="cursor-pointer"><i id="darkLightBtn" class="fa-solid fa-moon"></i></span>
            <span class="cursor-pointer"><i class="fa-solid fa-sign-in"></i></span>
            <span id="hamburgerBtn" class="relative z-50 md:hidden cursor-pointer text-[25px]"><i class="fa-solid fa-bars"></i></span>
        </nav>
    </div>
    <!-- navigations which will expand on clicking hamburger [For Mobiles] -->
    <nav id="hamburgerList" class="z-30 dark:bg-secondary-dark shadow shadow-gray-700 dark:text-text-dark duration-500 transition-all flex-col items-center overflow-hidden max-h-0  gap-2 text-body-desktop flex relative">
            <a href="signup.php">Sign up</a>
            <a href="portfolio.php">Portfolio</a>
            <a href="sellbuy.php">Buy/Sell</a>
            <a href="transaction.php">Transactions</a>
            <a href="articles.php">Articles</a>
                <a href="quiz.php">Play Quiz</a>
                <a href="videos.php">Videos</a>
                <a href="delete.php">Delete Account</a>
    </nav>
    <div id="hamburgerListOverlay" class="fixed top-0 left-0 bottom-0 right-0 hidden"></div>

</header>


    <!-- ----------MOBILE DEVICE SEARCH BAR------------ -->
    <div id="overlay" class="fixed bg-[#00000075] top-0 left-0 right-0 bottom-0 backdrop-blur-xs hidden"></div>

    <div>
        <div id="searchBar" class="border duration-500 transition-all pr-2 rounded-full  bg-bg-light dark:bg-hsecondary-dark fixed top-[20%] left-[50%] translate-x-[-50%] flex scale-0 ">
            <input id="stockSearchBar" type="text" class="rounded-full outline-none py-1 w-[200px] text-center" placeholder="Ex - AAPL">
            <button id="stockSearchBtn" class="cursor-pointer md:hover:scale-115 transition"><i class="fa-solid fa-search"></i></button>
            <p id="validationMessageInMobile" class="rounded-sm text-white bg-red-600 absolute top-[-100%] left-[5%] text-sm"></p>
        </div>
    </div>
    <div id="loader" class="loader fixed top-[50%] left-[50%] translate-[-50%]"></div>

    <!-- this is the icon at right bottom for the quick access -->
    <div id="searchIcon"  title="Search any stock" class="md:cursor-pointer block border-r-0 w-fit py-1 px-2 rounded-l-2xl fixed right-0 top-100 bg-[#d2cdcd] dark:bg-bg-dark">
        <i class="fa-solid fa-search"></i>
    </div>     



         <!-- search popups -->
         <div id="stockInfoCard" class="transition-all scale-0 flex shadow-box-light dark:shadow-box-dark
 w-[70%] max-w-[250px] flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[35%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <img id="stockImage" src="" alt="stock image" class="rounded-full block w-[50%] m-auto" >
            <p id="symbolName" class="text-center"></p>
            <p id="companyName" class="text-center"></p>
            <p class="text-center">$<span  id="stockPrice"></span></p>
         </div>
         <div id="notFoundCard" class="shadow-box-light dark:shadow-box-dark transition-all scale-0 text-center w-[150px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[35%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
            <p>No Stock Found!!</p>
         </div>