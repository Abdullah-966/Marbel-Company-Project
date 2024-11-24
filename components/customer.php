<?php
include('database/conn.php');
$successMessage = "";
$errorMessage = "";
$execute = null; // Initialize $execute to avoid "undefined variable" warning

// Only select the data if insert was successful
$select = "SELECT * FROM `customer`";
$execute = mysqli_query($con, $select);

if (isset($_POST['customer_btn'])) {
  $name = isset($_POST['customerName']) ? $_POST['customerName'] : '';
  $phone = isset($_POST['customerPhone']) ? $_POST['customerPhone'] : '';
  $city = isset($_POST['customerCity']) ? $_POST['customerCity'] : '';
  $address = isset($_POST['customerAddress']) ? $_POST['customerAddress'] : '';

  // Prepare and execute the INSERT query
  $insert = "INSERT INTO `customer` (`customer_name`, `customer_number`, `customer_city`, `customer_address`) 
             VALUES ('$name', '$phone', '$city', '$address')";
  $run = mysqli_query($con, $insert);

  if ($run) {
    $successMessage = "Customer added successfully!";
  } else {
    $errorMessage = "Error: Unable to add customer.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <!-- Display Success or Error Message -->
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

    <!-- Add Customer Form -->
    <div id="addCustomer" class="form-container hidden">
    <form method="POST" id="addCustomerForm">
        <div class="form-section-title text-center">Customer Information</div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="customerName" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Enter customer name">
          </div>
          <div class="col-md-6">
            <label for="customerPhone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="customerPhone" name="customerPhone" placeholder="Enter phone number">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="customerCity" class="form-label">City</label>
            <input type="text" class="form-control" id="customerCity" name="customerCity" placeholder="Enter city">
          </div>
          <div class="col-md-6">
            <label for="customerAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="customerAddress" name="customerAddress" placeholder="Enter address">
          </div>
        </div>
        <button type="submit" name="customer_btn" class="btn btn-outline-primary w-100 mb-3 p-2">Submit Customer</button>
      </form>
    </div>

    <!-- View Customer List -->
    <div id="listCustomers" class=" form-container hidden mt-4">
      <h2 class="form-section-title text-center">List Customers</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">City</th>
            <th scope="col">Address</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if $execute is not null before using mysqli_num_rows
          if ($execute && mysqli_num_rows($execute) > 0) {
            while ($row = mysqli_fetch_assoc($execute)) {
              echo "
                  <tr>
                    <td>{$row['customer_name']}</td>
                    <td>{$row['customer_number']}</td>
                    <td>{$row['customer_city']}</td>
                    <td>{$row['customer_address']}</td>
                    <td>
                      <button class='btn btn-sm btn-outline-secondary w-100'>
                        Edit
                      </button>
                    </td>
                  </tr>
                ";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No customers found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
<?php mysqli_close($con); ?>