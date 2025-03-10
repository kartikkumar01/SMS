<header class="flex items-center justify-between px-5 text-xl dark:bg-secondary-dark dark:text-text-dark">
        <div>
            <img id="logo" src="./img/logo.png" alt="sms logo" class="w-15">
        </div>
        <nav class="flex gap-4">
            <a href="#" class="hidden sm:block">Sign up</a>
            <a href="#" class="hidden sm:block">Portfolio</a>
            <a href="#" class="hidden sm:block">Transactions</a>
            <span id="learnBtn" class="cursor-pointer hidden sm:block relative">
                Learn <i class="fa-solid fa-angle-down align-middle"></i>
                <nav id="learnList" class="shadow shadow-gray-700 transition-all flex absolute flex-col items-center max-h-0 bg-bg-light overflow-hidden dark:bg-secondary-dark">
                    <a href="#" class="">Articles</a>
                    <a href="#" class="">Play&nbsp;Quiz</a>
                    <a href="#" class="">Videos</a>
                 </nav>
            </span>
            <a href="#" class="cursor-pointer hidden sm:block">Buy/Sell</a>
            <span class="cursor-pointer"><i id="darkLightBtn" class="fa-solid fa-moon"></i></span>
            <span class="cursor-pointer"><i class="fa-solid fa-sign-in"></i></span>
            <span id="hamburgerBtn" class="sm:hidden cursor-pointer"><i class="fa-solid fa-bars"></i></span>
        </nav>
    </header>

    <!-- navigations which will expand on clicking hamburger -->
     <nav id="hamburgerList" class=" dark:bg-secondary-dark shadow shadow-gray-700 dark:text-text-dark transition-all flex flex-col items-center overflow-hidden max-h-0 sm:hidden">
        <a href="#" class="">Sign up</a>
        <a href="#" class="">Portfolio</a>
        <a href="#" class="">Buy/Sell</a>
        <a href="#" class="">Transactions</a>
        <a href="#" class="">Articles</a>
        <a href="#" class="">Play Quiz</a>
        <a href="#" class="">Videos</a>
        <a href="#" class="">Delete Account</a>
     </nav>