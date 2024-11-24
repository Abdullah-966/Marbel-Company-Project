<!-- create sale order-->
<div id="createSaleOrder" class="form-container  hidden">
      <!-- Customer Information Section -->
      <div class="form-section-title text-center">Customer Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="customerName" class="form-label">Customer Name</label>
          <input type="text" class="form-control" id="customerName" placeholder="Enter customer name" />
        </div>
        <div class="col-md-6">
          <label for="customerPhone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="customerPhone" placeholder="Enter phone number" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="customerAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="customerAddress" placeholder="Enter address" />
        </div>
      </div>

      <!-- Order Information Section -->
      <div class="section-divider"></div>
      <div class="form-section-title text-center">Order Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="orderDate" class="form-label">Order Date</label>
          <input type="datetime-local" class="form-control" id="orderDate" />
        </div>
        <div class="col-md-6">
          <label for="orderStatus" class="form-label">Order Status</label>
          <select class="form-select" id="orderStatus">
            <option value="pending">Pending</option>
            <option value="processed">Processed</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
          </select>
        </div>
      </div>

      <!-- Product Information Section -->
      <div class="section-divider"></div>
      <div class="form-section-title text-center">Product Information</div>
      <div id="product-info">
        <div class="row">
          <div class="col-md-4">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name" />
          </div>
          <div class="col-md-4">
            <label for="quantity" class="form-label">Quantity</label>
            <div class="measurement-input">
              <input type="text" class="form-control" id="quantityFeet" placeholder="Feet (e.g., 5)" />
              <input type="text" class="form-control" id="quantityInches" placeholder='Inches (e.g., 9")' />
            </div>
          </div>
          <div class="col-md-2">
            <label for="unitPrice" class="form-label">Unit Price</label>
            <input type="number" class="form-control" id="unitPrice" placeholder="Enter price" />
          </div>
          <div class="col-md-2">
            <label for="totalPrice" class="form-label">Total Price</label>
            <input type="number" class="form-control" id="totalPrice" placeholder="0" readonly />
          </div>
        </div>
      </div>
      <button type="button" class="btn add-product-btn">Add Product</button>

      <!-- Payment Information Section -->
      <div class="section-divider"></div>
      <div class="form-section-title text-center">Payment Information</div>
      <div class="row">
        <div class="col-md-6">
          <label for="paymentMethod" class="form-label">Payment Method</label>
          <select class="form-select" id="paymentMethod">
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
          <select class="form-select" id="paymentStatus">
            <option value="unpaid">Unpaid</option>
            <option value="paid">Paid</option>
            <option value="partial">Partial</option>
          </select>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="section-divider"></div>
      <button type="submit" class="btn btn-outline-primary submit-btn mb-3 p-2 w-100">
        Submit Order
      </button>
    </div>

<div id="listSaleOrders" class="form-container   hidden">
      <h2 class="form-section-title  text-center">List Sale Orders</h2>
      <!-- Table Section -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Account Balance</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Bill & Utility</td>
            <td>Address 1</td>
            <td>123456789</td>
            <td>Rs 0/-</td>
            <td>10/21/2022</td>
            <td>
              <button class="btn btn-sm btn-outline-secondary w-100">
                Edit
              </button>
            </td>
          </tr>
          <tr>
            <td>Cash Book</td>
            <td>Address 2</td>
            <td>987654321</td>
            <td>Rs 0/-</td>
            <td>10/21/2022</td>
            <td>
              <button class="btn btn-sm btn-outline-secondary w-100">
                Edit
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>