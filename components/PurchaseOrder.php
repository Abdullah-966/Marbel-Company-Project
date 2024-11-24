<?php
include 'database/conn.php';
$successMessage = '';
$errorMessage = '';

// Only select the data if insert was successful
$select = "SELECT * FROM purchase_order";
$execute = mysqli_query($con, $select);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['purchase-btn'])) {
    // Gather form data
    $vendor_name = $_POST['vendorName'] ?? '';
    $vendor_phone = $_POST['vendorPhone'] ?? '';
    $vendor_address = $_POST['vendorAddress'] ?? '';
    $purchase_date = $_POST['purchaseDate'] ?? '';
    $order_status = $_POST['orderStatus'] ?? '';
    $product_name = $_POST['productName'] ?? '';
    $unit_price = $_POST['unitPrice'] ?? '';
    $total_price = $_POST['totalPrice'] ?? '';
    $payment_method = $_POST['paymentMethod'] ?? '';
    $payment_status = $_POST['paymentStatus'] ?? '';

    // Handle quantity input types
    $quantity_type = $_POST['quantityType'] ?? '';
    $quantity_feet = $_POST['quantityFeet'] ?? '';
    $quantity_inches = $_POST['quantityInches'] ?? '';
    $quantity_dimensions = $_POST['quantityDimensions'] ?? '';
    $total_sq_ft = 0; // Default square footage calculation

    if ($quantity_type === 'feet') {
      $total_sq_ft = $quantity_feet; // Assume direct square feet entry
    } elseif ($quantity_type === 'inches') {
      $total_sq_ft = $quantity_inches / 12; // Convert inches to feet
    } elseif ($quantity_type === 'dimensions') {
      if (preg_match('/^(\d+)x(\d+)$/', $quantity_dimensions, $matches)) {
        $total_sq_ft = $matches[1] * $matches[2]; // Width x Height calculation
      } else {
        $errorMessage = "Invalid dimensions format. Please use WxH.";
      }
    }

    // Insert into `purchase_order` table
    $insertPurchaseOrder = "INSERT INTO `purchase_order` 
    (`customer_name`, `customer_number`, `customer_address`, `order_date_time`, `order_status`, 
    `product_name`, `product_quantity_feet`, `product_quantity_inches`, 
    `product_quantity_dimensions`, `total_sq_ft`, `unit_price`, `total_price`, 
    `payment_method`, `payment_status`)
    VALUES ('$vendor_name', '$vendor_phone', '$vendor_address', '$purchase_date', '$order_status', 
    '$product_name', '$quantity_feet', '$quantity_inches', 
    '$quantity_dimensions', '$total_sq_ft', '$unit_price', '$total_price', 
    '$payment_method', '$payment_status')";

    $purchaseResult = mysqli_query($con, $insertPurchaseOrder);

    // If successful, insert product data into `current_inventory`
    if ($purchaseResult) {
      $insertInventory = "INSERT INTO `current_inventory` 
      (`marble_name`, `dimensions`, `available_stock_sq_ft`, `price_per_unit`, `supplier`)
      VALUES ('$product_name', '$quantity_dimensions', '$total_sq_ft', '$unit_price', '$vendor_name')";

      $inventoryResult = mysqli_query($con, $insertInventory);

      if ($inventoryResult) {
        $successMessage = "Purchase order and inventory updated successfully!";
      } else {
        $errorMessage = "Error: Unable to update inventory. " . mysqli_error($con);
      }
    } else {
      $errorMessage = "Error: Unable to add purchase order. " . mysqli_error($con);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase Order</title>
  <script>
    // JavaScript function to toggle quantity input fields
    function toggleQuantityInputs() {
      const quantityType = document.getElementById('quantityType').value;
      document.getElementById('quantityFeetInput').style.display = quantityType === 'feet' ? 'block' : 'none';
      document.getElementById('quantityInchesInput').style.display = quantityType === 'inches' ? 'block' : 'none';
      document.getElementById('quantityDimensionsInput').style.display = quantityType === 'dimensions' ? 'block' : 'none';
    }
  </script>
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
  <form method="post" id="createPurchaseOrderForm">
    <!-- Create Purchase Order Form -->
    <div id="createPurchaseOrders" class="form-container hidden">
      <!-- Vendor Information Section -->
      <div class="form-section-title text-center">Vendor Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="vendorName" class="form-label">Vendor Name</label>
          <input type="text" class="form-control" name="vendorName" id="vendorName" placeholder="Enter vendor name" />
        </div>
        <div class="col-md-6">
          <label for="vendorPhone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" name="vendorPhone" id="vendorPhone" placeholder="Enter phone number" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="vendorAddress" class="form-label">Address</label>
          <input type="text" class="form-control" name="vendorAddress" id="vendorAddress" placeholder="Enter address" />
        </div>
      </div>

      <!-- Purchase Information Section -->
      <div class="section-divider"></div>
      <div class="form-section-title text-center">Purchase Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="purchaseDate" class="form-label">Purchase Date</label>
          <input type="date" class="form-control" name="purchaseDate" id="purchaseDate" />
        </div>
        <div class="col-md-6">
          <label for="orderStatus" class="form-label">Order Status</label>
          <select class="form-select" name="orderStatus" id="orderStatus">
            <option value="pending">Pending</option>
            <option value="processed">Processed</option>
            <option value="shipped">Shipped</option>
            <option value="received">Received</option>
          </select>
        </div>
      </div>

      <!-- Product Information Section -->
      <div class="section-divider"></div>
      <div class="form-section-title text-center">Product Information</div>
      <div id="product-info">
        <div class="row">
          <div class="col-md-6">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter product name" />
          </div>
          <div class="col-md-6">
            <label for="quantityType" class="form-label">Quantity Type</label>
            <select class="form-select" name="quantityType" id="quantityType" onchange="toggleQuantityInputs()">
              <option value="feet">Feet</option>
              <option value="inches">Inches</option>
              <option value="dimensions">Dimensions</option>
            </select>
          </div>
        </div>

        <!-- Quantity Inputs -->
        <div class="row">
          <!-- Feet Input -->
          <div id="quantityFeetInput" class="col-md-4" style="display: block;">
            <label for="quantityFeet" class="form-label">Quantity (Feet)</label>
            <input type="text" class="form-control" name="quantityFeet" id="quantityFeet" placeholder="Feet (e.g., 5)" />
          </div>

          <!-- Inches Input -->
          <div id="quantityInchesInput" class="col-md-4" style="display: none;">
            <label for="quantityInches" class="form-label">Quantity (Inches)</label>
            <input type="text" class="form-control" name="quantityInches" id="quantityInches" placeholder="Inches (e.g., 60)" />
          </div>

          <!-- Dimensions Input -->
          <div id="quantityDimensionsInput" class="col-md-4" style="display: none;">
            <label for="quantityDimensions" class="form-label">Quantity (Dimensions)</label>
            <input type="text" class="form-control" name="quantityDimensions" id="quantityDimensions" placeholder="Dimensions (e.g., 5x10)" />
          </div>

          <!-- Unit Price -->
          <div class="col-md-4">
            <label for="unitPrice" class="form-label">Unit Price</label>
            <input type="number" class="form-control" name="unitPrice" id="unitPrice" placeholder="Enter price" />
          </div>

          <!-- Total Price -->
          <div class="col-md-4">
            <label for="totalPrice" class="form-label">Total Price</label>
            <input type="number" class="form-control" name="totalPrice" id="totalPrice" placeholder="0" readonly />
          </div>
        </div>

        <!-- Payment Information Section -->
        <div class="section-divider"></div>
        <div class="form-section-title text-center">Payment Information</div>
        <div class="row">
          <div class="col-md-6">
            <label for="paymentMethod" class="form-label">Payment Method</label>
            <select class="form-select" name="paymentMethod" id="paymentMethod">
              <option value="cash">Cash</option>
              <option value="jazzcash">JazzCash</option>
              <option value="easypaisa">Easypaisa</option>
              <option value="credit">Credit</option>
              <option value="bankTransfer">Bank Transfer</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="paymentStatus" class="form-label">Payment Status</label>
            <select class="form-select" name="paymentStatus" id="paymentStatus">
              <option value="unpaid">Unpaid</option>
              <option value="paid">Paid</option>
              <option value="partial">Partial</option>
            </select>
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" name="purchase-btn" class="btn btn-outline-primary submit-btn mb-3 w-100 p-2">
          Submit Purchase Order
        </button>
      </div>
    </div>
  </form>

  <!-- List purchase orders -->
  <div id="listPurchaseOrders" class="form-container hidden">
    <h2 class="form-section-title  text-center">List Purchase Orders</h2>
    <!-- Table Section -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Vendor Name</th>
          <th scope="col">Vendor Number</th>
          <th scope="col">Vendor Address</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity (Feet)</th>
          <th scope="col">Quantity (Inches)</th>
          <th scope="col">Quantity (Dimensions)</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Total Sq Ft</th>
          <th scope="col">Order Date</th>
          <th scope="col">Order Status</th>
          <th scope="col">Payment Method</th>
          <th scope="col">Payment Status</th>
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
                <td>{$row['customer_address']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['product_quantity_feet']}</td>
                <td>{$row['product_quantity_inches']}</td>
                <td>{$row['product_quantity_dimensions']}</td>
                <td>{$row['unit_price']}</td>
                <td>{$row['total_sq_ft']}</td>
                <td>{$row['order_date_time']}</td>
                <td>{$row['order_status']}</td>
                <td>{$row['payment_method']}</td>
                <td>{$row['payment_status']}</td>
              </tr>
            ";
          }
        } else {
          echo "<tr><td colspan='13' class='text-center'>No purchase orders found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>