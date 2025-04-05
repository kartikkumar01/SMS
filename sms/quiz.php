<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Quiz</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/quiz.js" defer></script>
    <style>
        @media (width > 700px){
            label{
                margin-left:20px;
            }
        }
    </style>
    <script src="js/stockSearchFeature.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <?php include('include/stocks-search-feature.php'); ?>
    <main class="w-[93%] md:w-[70%] mx-auto">

    <h1 class="text-3xl md:text-4xl font-bold text-center my-8">Check Your knowledge</h1>
    <div class="w-[98%] max-w-[800px] mx-auto bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">
        <form id="quizForm" class="space-y-6">
            <h1 class="text-3xl font-bold mb-6 text-center">Stock Market Quiz</h1>
            <!-- Question 1 -->
            <div>
          <p class="font-semibold mb-2">1. What is a stock?</p>
          <label class="block"><input type="radio" name="q1" value="Ownership" class="mr-2">Ownership</label>
          <label class="block"><input type="radio" name="q1" value="Loan" class="mr-2">Loan</label>
          <label class="block"><input type="radio" name="q1" value="Account" class="mr-2">Account</label>
            </div>
        
            <!-- Question 2 -->
            <div>
          <p class="font-semibold mb-2">2. Which is stock broker?</p>
          <label class="block"><input type="radio" name="q2" value="Amazon" class="mr-2">Amazon</label>
          <label class="block"><input type="radio" name="q2" value="Zerodha" class="mr-2">Zerodha</label>
          <label class="block"><input type="radio" name="q2" value="Flipkart" class="mr-2">Flipkart</label>
            </div>
        
            <!-- Question 3 -->
            <div>
          <p class="font-semibold mb-2">3. Which one is a stock exchange in India?</p>
          <label class="block"><input type="radio" name="q3" value="IMF" class="mr-2">IMF</label>
          <label class="block"><input type="radio" name="q3" value="RBI" class="mr-2">RBI</label>
          <label class="block"><input type="radio" name="q3" value="BSE" class="mr-2">BSE</label>
            </div>
        
            <!-- Question 4 -->
            <div>
          <p class="font-semibold mb-2">4. What is a dividend?</p>
          <label class="block"><input type="radio" name="q4" value="Tax" class="mr-2">Tax</label>
          <label class="block"><input type="radio" name="q4" value="Profit" class="mr-2">Profit</label>
          <label class="block"><input type="radio" name="q4" value="Loan" class="mr-2">Loan</label>
            </div>

            <div id="result" class="mt-6 text-xl font-semibold text-center hidden"></div>
            <div class="flex justify-center gap-2">
                <button type="button" onclick="checkAnswers()" class="bg-lime-100 hover:bg-lime-200 border dark:bg-blue-600 dark:hover:bg-blue-700 make-btn mt-4">
                    Submit
                </button>
                <button type="button" onclick="reload()" class="bg-lime-100 hover:bg-lime-200 border dark:bg-blue-600 dark:hover:bg-blue-700 make-btn mt-4">
                    Replay
                </button>
            </div>
        </form>
    </div>
    </main>
    
    <?php include("include/footer.php"); ?>
</body>
</html>

