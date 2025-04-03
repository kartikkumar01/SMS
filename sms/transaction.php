<?php
session_start();
include('include/login_required.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Transactions</title>
    <?php include("include/head-links.php"); ?>
    <script src="js/transaction.js" defer></script>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark sm:text-xl">
    <?php include("include/header.php"); ?>
    <main>
        <h1 class="font-bold text-2xl sm:text-3xl text-center my-5">Your Transactions</h1>
<table class="w-[95%] m-auto max-w-[800px] text-center" id="transactionParentContainer">
  <thead>
    <tr class="border-b text-center">
      <th class="hidden sm:table-cell">Sr.no</th>
      <th>Stock</th>
      <th class="hidden sm:table-cell">Date</th>
      <th class="hidden sm:table-cell">Time</th>
      <th>Qty</th>
      <th>Rate(1)</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody id="transactionContainer">
    <!-- Transactions will come here through javascript -->
  </tbody>
</table>
    </main>
    <?php include("include/footer.php"); ?>
</body>
</html>