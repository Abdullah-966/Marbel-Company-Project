<?php
include 'database/conn.php';
$successMessage = '';
$errorMessage = ''; // For catching any error during form submission
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCashEntry'])) {
  $transactionDate = $_POST['transactionDate'];
  $transactionAmount = $_POST['transactionAmount'];
  $cstmr_name = $_POST['cstmr_name'];
  $cstmr_phone = $_POST['cstmr_phone'];
  $paymentMode = $_POST['paymentMode'];
  $transactionReference = $_POST['transactionReference'];
  // Prepare and execute the INSERT query
  $insert = "INSERT INTO `cash_book`(`transaction_date`, `transaction_amount`, `transacter_name`, `contact_number`, `payment_mode`, `transaction_id`) 
            VALUES ('$transactionDate', '$transactionAmount', '$cstmr_name', '$cstmr_phone', '$paymentMode', '$transactionReference')";  
  $insertResult = mysqli_query($con, $insert);
  if ($insertResult) {
    $successMessage = "Cash Entry added successfully.";
    echo "<script>
    window.location.href = CashBook.php;
    </script>";
  } else {
    $errorMessage = "Error adding Cash Entry: " . mysqli_error($con);
  }
}
// Fetch the cash book data from the database
$cashQuery = "SELECT * FROM `cash_book`";
$cashResult = mysqli_query($con, $cashQuery);
// Debugging: Check if data was selected successfully
if (!$cashResult) {
  die("Error fetching data: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cash Book</title>
</head>
<body>
  <?php if (!empty($successMessage)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> <?php echo $successMessage; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> <?php echo $errorMessage; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <form action="" method="post" id="addCashEntryForm">
    <!-- Add Cash Entry -->
    <div id="addCashEntry" class="form-container hidden">
      <!-- Transaction Information Section -->
      <div class="form-section-title">Transaction Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="transactionDate" class="form-label">Transaction Date</label>
          <input type="date" class="form-control" name="transactionDate" id="transactionDate" required />
        </div>
        <div class="col-md-6">
          <label for="transactionAmount" class="form-label">Amount</label>
          <input type="number" class="form-control" name="transactionAmount" id="transactionAmount" placeholder="Enter amount" required />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="cstmr_name" class="form-label">Customer name</label>
          <input type="text" class="form-control" name="cstmr_name" id="cstmr_name" placeholder="Enter name" required />
        </div>
        <div class="col-md-6">
          <label for="cstmr_phone" class="form-label">Phone number</label>
          <input type="tel" class="form-control" name="cstmr_phone" id="cstmr_phone" placeholder="Enter number" required />
        </div>
      </div>
      <!-- Payment Information Section -->
      <div class="section-divider"></div>
      <div class="form-section-title">Payment Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="paymentMode" class="form-label">Payment Mode</label>
          <select class="form-select" name="paymentMode" id="paymentMode" required>
            <option value="cash">Cash</option>
            <option value="bank">Bank Transfer</option>
            <option value="cheque">Cheque</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="transactionReference" class="form-label">Transaction ID / Reference</label>
          <input type="text" class="form-control" name="transactionReference" id="transactionReference" placeholder="Enter transaction reference" required />
        </div>
      </div>
      <!-- Submit Button -->
      <div class="section-divider"></div>
      <button type="submit" name="addCashEntry" class="btn btn-outline-primary submit-btn w-100 mb-3 p-2">
        Submit Cash Entry
      </button>
    </div>
  </form>
  <!-- View Cash Book -->
  <div id="viewCashBook" class="form-container hidden">
    <h2 class="form-section-title text-center">View Cash Book</h2>
    <!-- Cash Book Table -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Transacter Name</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Payment Mode</th>
            <th scope="col">Transaction Amount (USD)</th>
            <th scope="col">Transaction Reference</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if there are any records to display
          if (mysqli_num_rows($cashResult) > 0) {
            $count = 1; // Initialize a counter
            while ($row = mysqli_fetch_assoc($cashResult)) {
              echo "<tr>
                      <th scope='row'>{$count}</th>
                      <td>{$row['transaction_date']}</td>
                      <td>{$row['transacter_name']}</td>
                      <td>{$row['contact_number']}</td>
                      <td>{$row['payment_mode']}</td>
                      <td>{$row['transaction_amount']}</td>
                      <td>{$row['transaction_id']}</td>
                    </tr>";
              $count++; // Increment counter for each row
            }
          } else {
            echo "<tr><td colspan='7' class='text-center'>No cash entries found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>