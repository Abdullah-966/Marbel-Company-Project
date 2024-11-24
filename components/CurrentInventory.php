<?php
// Include database connection
include 'database/conn.php';

// Fetch the current inventory data from the database
$inventoryQuery = "SELECT * FROM `current_inventory`";
$inventoryResult = mysqli_query($con, $inventoryQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Current Inventory</title>
</head>

<body>

  <!-- start inventory section -->
  <div id="currentInventory" class="form-container hidden">
    <h2 class="form-section-title text-center">Current Marble Inventory</h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Marble Type</th>
            <th scope="col">Dimensions</th>
            <th scope="col">Stock Available (sq ft)</th>
            <th scope="col">Price per sq ft (USD)</th>
            <th scope="col">Supplier</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if there are any rows returned from the query
          if (mysqli_num_rows($inventoryResult) > 0) {
            $count = 1;
            // Fetch each row and populate the table
            while ($row = mysqli_fetch_assoc($inventoryResult)) {
              echo "<tr>
                                <th scope='row'>{$count}</th>
                                <td>{$row['marble_name']}</td>
                                <td>{$row['product_quantity_feet']}</td>
                                <td>{$row['product_quantity_inches']}</td>
                                <td>{$row['product_quantity_dimensions']}</td>
                                <td>{$row['available_stock']}sq ft</td>
                                <td>\${$row['price_per_unit']}</td>
                                <td>{$row['supplier']}</td>
                            </tr>";
              $count++;
            }
          } else {
            // If no data found, display a message
            echo "<tr><td colspan='7' class='text-center'>No inventory found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- end inventory section -->
</body>

</html>