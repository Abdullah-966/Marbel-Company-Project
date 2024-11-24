<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ERP - Add Local Factory</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
    rel="stylesheet" />
  <!-- chart js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Bootstrap JS (necessary for collapsible behavior) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Include FontAwesome -->


  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <?php
  // connection file
  include("database/conn.php");
  include('Components/header.php');
  include('Components/sidebar.php');
  ?>
  <!-- Main Content Area -->
  <main class="content-area">
    <?php
    // Dashboard Section
    include('Components/dashboard.php');
    //  Customer Section
    include('Components/customer.php');
    // Supplier Section
    include('Components/supplier.php');
    // Purchase Orders Section
    include('Components/PurchaseOrder.php');
    // Sale Orders Section
    include('Components/SaleOrder.php');
    // Order Receipt Section
    include('Components/OrderReceipt.php');
    // Cash Book Section
    include('Components/CashBook.php');
    // Earning Section
    include('Components/Earning.php');
    // Income Statement Section
    include('Components/IncomeStatement.php');
    // Expense Section
    include('Components/Expense.php');
    // Current Inventory Section
    include('Components/CurrentInventory.php');
    // Breakage Recovery Section
    include('Components/BreakageRecovery.php');
    // Purchase Deliveries Section
    // include('Components/PurchaseDeliveries.php');
    // Sale Deliveries Section
    // include('Components/SaleDeliveries.php');
    // Employee Attendance Section
    include('Components/Attendance.php');
    // Employee History Section
    include('Components/EmployeeHistory.php');
    // Add Employee Section
    include('Components/AddEmployee.php');
    ?>


  </main>


  <!-- Custom JS -->
  <script src="index.js"></script>
</body>

</html>