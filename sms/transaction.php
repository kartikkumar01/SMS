<?php
session_start();
include('include/login_required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Transactions</title>
    <?php include("include/head-links.php"); ?>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include("include/header.php"); ?>
    <main>
        <h1 class="font-bold text-2xl sm:text-3xl text-center my-5">Your Transactions</h1>
        <p class="text-center">You do not have any transactions yet.</p>
<table class="w-[95%] m-auto max-w-[800px] ">
  <thead>
    <tr class="border-b text-left">
      <th>Stock</th>
      <th class="hidden sm:table-cell">Date</th>
      <th class="hidden sm:table-cell">Time</th>
      <th>Qty</th>
      <th>1 stock</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-red-400">-10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
    <tr>
      <td>AAPL</td>
      <td class="hidden sm:table-cell">12-December-2025</td>
      <td class="hidden sm:table-cell">05:35pm</td>
      <td class="text-green-400">+10</td>
      <td>$500</td>
      <td>$5000</td>
    </tr>
  </tbody>
</table>
    </main>
    <?php include("include/footer.php"); ?>
</body>
</html>