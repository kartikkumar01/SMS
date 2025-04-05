<!-- Search bar which appears when user clicks on bottom right search btn -->
<div id="searchBar" class="border duration-500 transition-all pr-4 rounded-full  bg-bg-light dark:bg-hsecondary-dark fixed z-50 top-[5%] left-[50%] translate-x-[-50%] flex scale-0 ">
    <input id="stockSearchBar" type="text" class="py-2 rounded-full outline-none w-[200px] text-center" placeholder="Ex - AAPL">
    <button id="stockSearchBtn" class="cursor-pointer md:hover:scale-115 transition"><i class="fa-solid fa-search"></i></button>
    <p id="validationMessage" class="rounded-sm text-white bg-red-600 absolute top-[-100%] left-[5%] text-sm"></p>
</div>
<div id="overlay" class="fixed bg-[#00000075] top-0 left-0 right-0 bottom-0 backdrop-blur-xs hidden"></div>

<!-- Loader which appears while fetching the data from the finnhub api -->
<div id="loader" class="z-[500] loader fixed top-[50%] left-[50%] translate-[-50%]"></div>

<!-- This is the icon at right bottom for the quick access -->
<div id="searchIcon"  title="Search any stock" class="cursor-pointer block border-r-0 w-fit py-1 px-2 rounded-l-2xl fixed right-0 top-100 bg-[#d2cdcd] dark:bg-bg-dark">
        <i class="fa-solid fa-search"></i>
        <span class="text-[#464545] hidden md:inline">ctrl</span>
</div> 

 <!-- Popup if stock found -->
<div id="stockInfoCard" class="transition-all scale-0 flex shadow-box-light dark:shadow-box-dark w-[70%] max-w-[250px] flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[20%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
    <p class="text-center text-[16px]">IPO : <span id="stockIPO"></span></p>
    <img id="stockImage" src="" alt="stock image" class="rounded-full block w-[50%] m-auto" >
    <p id="stockSymbol" class="text-center"></p>
    <a id="stockLink" target="_blank"><p id="stockCompany" class="text-center text-link"></p></a>
    <p class="text-center font-bold">$<span  id="stockPrice"></span></p>
</div>

<!-- Popup if stock not found -->
<div id="notFoundCard" class="shadow-box-light dark:shadow-box-dark transition-all scale-0 text-center w-[150px] flex flex-col items-center justify-center gap-2 p-4 rounded-sm fixed top-[20%] left-[50%] translate-x-[-50%] bg-bg-light dark:bg-hsecondary-dark">
    <p>No Stock Found!!</p>
</div>