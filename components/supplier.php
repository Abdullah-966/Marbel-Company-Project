<?php 
include 'database/conn.php';
$successMessage = '';
$errorMessage = '';

// Only select the data if insert was successful
$select = "SELECT * FROM `supplier`";
$execute = mysqli_query($con, $select);

if (isset($_POST['supplier_btn'])) {
  $sup_name = (isset($_POST['supplierName'])) ? $_POST['supplierName'] : '';
  $cont_person = (isset($_POST['contactPerson'])) ? $_POST['contactPerson'] : '';
  $sup_phone = (isset($_POST['supplierPhone'])) ? $_POST['supplierPhone'] : '';
  $comp_name = (isset($_POST['companyName'])) ? $_POST['companyName'] : '';
  $comp_address = (isset($_POST['companyAddress'])) ? $_POST['companyAddress'] : '';
  $comp_city = (isset($_POST['companyCity'])) ? $_POST['companyCity'] : '';

  // Prepare and execute the INSERT query
  $insert = "INSERT INTO `supplier` (`supplier_name`,`contact_person`,`phone_number`,`company_name`,`company_address`,`company_city`) 
      VALUES ('$sup_name','$cont_person','$sup_phone','$comp_name','$comp_address','$comp_city')";
  $run = mysqli_query($con, $insert);

  if ($run) {
    $successMessage = "Supplier added successfully!";
  } else {
    $errorMessage = "Error: Unable to add supplier.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Management</title>
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

  <form method="post"  id="addSupplierForm">
  <!-- Add Supplier Form -->
  <div id="addSupplier" class="form-container hidden">
    <!-- Supplier Information Section -->
      <div class="form-section-title text-center">Supplier Information</div>
        <div class="row">
          <div class="col-md-6">
            <label for="supplierName" class="form-label">Supplier Name</label>
            <input type="text" class="form-control" name="supplierName" id="supplierName" placeholder="Enter supplier name" />
          </div>
          <div class="col-md-6">
            <label for="contactPerson" class="form-label">Contact Person</label>
            <input type="text" class="form-control" name="contactPerson" id="contactPerson" placeholder="Enter contact person's name" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="supplierPhone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name="supplierPhone" id="supplierPhone" placeholder="Enter phone number" />
          </div>
        </div>
        <!-- Company Information Section -->
        <div class="section-divider"></div>
        <div class="form-section-title text-center">Company Information</div>
        <div class="row">
          <div class="col-md-6">
            <label for="companyName" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Enter company name" />
          </div>
          <div class="col-md-6">
            <label for="companyAddress" class="form-label">Company Address</label>
            <input type="text" class="form-control" name="companyAddress" id="companyAddress" placeholder="Enter company address" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="companyCity" class="form-label">City</label>
            <input type="text" class="form-control" name="companyCity" id="companyCity" placeholder="Enter city" />
          </div>
        </div>
    
        <!-- Submit Button -->
        <div class="section-divider"></div>
        <button type="submit" name="supplier_btn" class="btn btn-outline-primary submit-btn w-100 mb-3 p-2">
          Submit Supplier
        </button>
       
    </div>
  </form>
  <!-- View Supplier List -->
  <div id="listSuppliers" class="form-container hidden">
    <h2 class="form-section-title text-center">List Suppliers</h2>
    <!-- Table Section -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Company Name</th>
          <th scope="col">Company Address</th>
          <th scope="col">Company City</th>
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
                    <td>{$row['supplier_name']}</td>
                    <td>{$row['contact_person']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['company_name']}</td>
                    <td>{$row['company_address']}</td>
                    <td>{$row['company_city']}</td>
                    <td>
                      <button class='btn btn-sm btn-outline-secondary w-100'>
                        Edit
                      </button>
                    </td>
                  </tr>
                ";
          }
        } else {
          echo "<tr><td colspan='6' class='text-center'>No customers found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>


</body>

</html>