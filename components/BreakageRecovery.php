<?php
include 'database/conn.php';
$successMessage = '';
$errorMessage = '';

// Fetch data from breakage_marble table
$select = "SELECT * FROM `breakage_marble`";
$execute = mysqli_query($con, $select);

// Insert data if the form is submitted
if (isset($_POST['breakage_btn'])) {
  $marbleType = isset($_POST['marbleType']) ? $_POST['marbleType'] : '';
  $supplier = isset($_POST['supplier']) ? $_POST['supplier'] : '';
  $brokenQuantity = isset($_POST['brokenQuantity']) ? $_POST['brokenQuantity'] : '';
  $recoveredQuantity = isset($_POST['recoveredQuantity']) ? $_POST['recoveredQuantity'] : '';
  $recoveryDate = isset($_POST['recoveryDate']) ? $_POST['recoveryDate'] : '';

  // Prepare and execute the INSERT query
  $insert = "INSERT INTO `breakage_marble`(`marble_name`, `marble_supplier`, `broken_quantity`, `recovered_quantity`, `recovered_date`) 
            VALUES ('$marbleType', '$supplier', '$brokenQuantity', '$recoveredQuantity', '$recoveryDate')";
  $run = mysqli_query($con, $insert);

  if ($run) {
    $successMessage = "Breakage recovery record added successfully!";
    // Refresh the data after insert
    $execute = mysqli_query($con, $select); 
  } else {  
    $errorMessage = "Error: Unable to add breakage recovery record." . mysqli_error($con);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breakage Recovery</title>
</head>
<body>
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

  <!-- Add Breakage Recovery Form -->
  <form method="post" id="addbreakageForm ">
    <div id="addbreakage" class="form-container hidden">
      <h2 class="form-section-title text-center">Add New Breakage Recovery Record</h2>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="marbleType" class="form-label">Marble Type</label>
          <input type="text" class="form-control" name="marbleType" id="marbleType" placeholder="Enter Marble Type" required>
        </div>
        <div class="col-md-6">
          <label for="supplier" class="form-label">Supplier</label>
          <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Enter Supplier Name" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="brokenQuantity" class="form-label">Broken Quantity (sq ft)</label>
          <input type="number" class="form-control" name="brokenQuantity" id="brokenQuantity" placeholder="Enter Broken Quantity" required>
        </div>
        <div class="col-md-6">
          <label for="recoveredQuantity" class="form-label">Recovered Quantity (sq ft)</label>
          <input type="number" class="form-control" name="recoveredQuantity" id="recoveredQuantity" placeholder="Enter Recovered Quantity" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <label for="recoveryDate" class="form-label">Recovery Date</label>
          <input type="date" class="form-control" name="recoveryDate" id="recoveryDate" required>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" name="breakage_btn" class="btn btn-outline-primary mb-3 p-2 w-100">Add Record</button>
      </div>
    </div>
  </form>

  <!-- View Breakage Recovery Section -->
  <div id="viewRecovery" class="form-container hidden">
    <h2 class="form-section-title text-center">Breakage Recovery</h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Marble Type</th>
            <th scope="col">Broken Quantity (sq ft)</th>
            <th scope="col">Recovered Quantity (sq ft)</th>
            <th scope="col">Recovery Date</th>
            <th scope="col">Supplier</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($execute) > 0): ?>
            <?php $counter = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($execute)): ?>
              <tr>
                <th scope="row"><?php echo $counter++; ?></th>
                <td><?php echo $row['marble_name']; ?></td>
                <td><?php echo $row['broken_quantity']; ?></td>
                <td><?php echo $row['recovered_quantity']; ?></td>
                <td><?php echo $row['recovered_date']; ?></td>
                <td><?php echo $row['marble_supplier']; ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center">No records found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>