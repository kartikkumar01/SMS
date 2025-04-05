<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - articles</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/stockSearchFeature.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    <?php include('include/stocks-search-feature.php'); ?>
    <main class="w-[93%] md:w-[70%] mx-auto">
        <h1 class="text-4xl font-bold text-center my-8">Stock Market Basics</h1>
        
        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">What is the Stock Market?</h2>
            <p class="text-lg leading-relaxed">
                The stock market is a global marketplace where shares of publicly traded companies are bought and sold. It enables businesses to raise capital and investors to earn returns on their money.
                Major stock exchanges include the New York Stock Exchange (NYSE) and NASDAQ.
            </p>
        </section>
        
        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">How Does Stock Trading Work?</h2>
            <p class="text-lg leading-relaxed">
                When you buy a stock, you purchase a small ownership stake in a company. Prices fluctuate based on demand, earnings, news, and economic conditions. Traders analyze trends and use different strategies to maximize profits.
            </p>
        </section>

        <section class="bg-red-100 dark:bg-red-800 p-6 rounded-lg shadow-lg border-l-4 border-red-500 my-8">
            <h2 class="text-2xl font-semibold text-red-700 dark:text-red-300">⚠️ Investment Risk Warning</h2>
            <p class="text-lg leading-relaxed text-red-800 dark:text-red-200">
                Investing in the stock market involves risks, and prices can be highly volatile. Only invest money that you can afford to lose. Conduct thorough research before making any financial decisions, and consider consulting with a financial advisor for guidance. Never invest based on speculation alone.
            </p>
        </section>

        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">Understanding Stock Market Orders</h2>
            <p class="text-lg leading-relaxed">
                Investors use different types of orders to buy or sell stocks. The most common ones are:
            </p>
            <ul class="list-disc pl-6 text-lg leading-relaxed">
                <li><strong>Market Order:</strong> Buy or sell immediately at the best available price.</li>
                <li><strong>Limit Order:</strong> Buy or sell only at a specific price or better.</li>
                <li><strong>Stop Order:</strong> An order that triggers once a stock reaches a certain price.</li>
            </ul>
        </section>
        
        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">Types of Stocks</h2>
            <p class="text-lg leading-relaxed">
                Stocks can be categorized based on different factors such as growth potential, dividends, and market size. The main types are:
            </p>
            <ul class="list-disc pl-6 text-lg leading-relaxed">
                <li><strong>Common Stocks:</strong> Provide ownership with voting rights and dividends.</li>
                <li><strong>Preferred Stocks:</strong> Offer fixed dividends but limited voting rights.</li>
                <li><strong>Growth Stocks:</strong> Companies that reinvest earnings instead of paying dividends.</li>
                <li><strong>Value Stocks:</strong> Stocks trading below their intrinsic value.</li>
                <li><strong>Blue-Chip Stocks:</strong> Shares of large, established companies.</li>
            </ul>
        </section>
        
        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">Stock Market Strategies</h2>
            <p class="text-lg leading-relaxed">
                Investors and traders use various strategies to make profits in the stock market. Some of the popular ones include:
            </p>
            <ul class="list-disc pl-6 text-lg leading-relaxed">
                <li><strong>Long-Term Investing:</strong> Holding stocks for years to benefit from growth.</li>
                <li><strong>Day Trading:</strong> Buying and selling stocks within the same day.</li>
                <li><strong>Swing Trading:</strong> Holding stocks for several days or weeks to capitalize on short-term trends.</li>
                <li><strong>Dividend Investing:</strong> Buying stocks that pay regular dividends.</li>
            </ul>
        </section>
        
        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">Risk Management in Stock Trading</h2>
            <p class="text-lg leading-relaxed">
                Investing in stocks carries risks, and managing them is crucial for success. Some key risk management techniques include:
            </p>
            <ul class="list-disc pl-6 text-lg leading-relaxed">
                <li><strong>Diversification:</strong> Spreading investments across different stocks to reduce risk.</li>
                <li><strong>Setting Stop-Loss Orders:</strong> Automatically selling stocks to prevent excessive losses.</li>
                <li><strong>Research and Analysis:</strong> Evaluating companies before investing.</li>
                <li><strong>Investing Only What You Can Afford to Lose:</strong> Avoiding high-risk investments with money needed for essential expenses.</li>
            </ul>
        </section>
        
        <section class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold mb-4">Why Practice with a Stock Market Simulator?</h2>
            <p class="text-lg leading-relaxed">
                Learning the stock market without real-world experience can be overwhelming. A simulator allows beginners to:
            </p>
            <ul class="list-disc pl-6 text-lg leading-relaxed">
                <li>Practice trading without risking real money.</li>
                <li>Understand how stock prices move in real-time.</li>
                <li>Experiment with different investment strategies.</li>
                <li>Learn how to manage a virtual portfolio effectively.</li>
            </ul>
        </section>
    </main>
    <?php include("include/footer.php"); ?>
</body>
</html>