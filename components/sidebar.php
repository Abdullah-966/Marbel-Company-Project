 <!-- Sidebar -->
 <nav class="sidebar">
   <ul class="nav flex-column">
     <!-- Company Logo and Name -->
     <li class="nav-item">
       <img src="images/company_logo.jpg" alt="Rana Marbles" style="
              height: 70px;
              width: 70px;
              border-radius: 50%;
              margin-top: 15px;
            " />
       <span class="span">Rana Marble Factory</span>
     </li>

     <!-- Dashboard Section -->
     <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">DASHBOARD</li>
     <li class="nav-item">
       <a class="nav-link" href="#" onclick="showForm('dashboard')">
         <i class="bi bi-house-door-fill"></i> Dashboards
       </a>
     </li>

     <!-- Accounts Section -->
     <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">ACCOUNTS</li>
     <!-- Customers Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#customersDropdown" role="button"
         aria-expanded="false">
         <i class="bi bi-person-fill"></i> Customers
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="customersDropdown">
         <li>
           <a class="nav-link" href="#" onclick="showForm('listCustomers')">List Customers</a>
         </li>
         <li>
  <a class="nav-link" href="#" onclick="showForm('addCustomer')">Add Customer</a>
</li>
       </ul>
     </li>

     <!-- Suppliers Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#suppliersDropdown" role="button"
         aria-expanded="false">
         <i class="bi bi-people-fill"></i> Suppliers
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="suppliersDropdown">
         <li>
           <a class="nav-link" href="#" onclick="showForm('listSuppliers')">List Suppliers</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('addSupplier')">Add Supplier</a>
         </li>
       </ul>
     </li>

     <!-- Orders Section -->
     <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">ORDERS</li>
     <!-- Sale Orders Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#saleOrdersDropdown" role="button"
         aria-expanded="false">
         <i class="bi bi-receipt"></i> Sale Orders
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="saleOrdersDropdown">
         <li>
           <a class="nav-link" href="#" onclick="showForm('listSaleOrders')">List Sale Orders</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('createSaleOrder')">Create Sale Order</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('orderreceipt')">Order Receipt</a>
         </li>
       </ul>
     </li>

     <!-- Purchase Orders Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#purchaseOrdersDropdown" role="button"
         aria-expanded="false">
         <i class="bi bi-cart-fill"></i> Purchase Orders
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="purchaseOrdersDropdown">
         <li>
           <a class="nav-link" href="#" onclick="showForm('listPurchaseOrders')">List Purchase Orders</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('createPurchaseOrders')">Create Purchase Order</a>
         </li>
       </ul>
     </li>

     <!-- Finance Section -->
     <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">FINANCE</li>
     <!-- Cash Book Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#cashBookDropdown" role="button"
         aria-expanded="false">
         <i class="bi bi-cash"></i> Cash Book
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="cashBookDropdown">
         <li>
           <a class="nav-link" href="#" onclick="showForm('viewCashBook')">View Cash Book</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('addCashEntry')">Add Cash Entry</a>
         </li>
       </ul>
     </li>

     <!-- Earning Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#earningsDropdown" role="button"
         aria-expanded="false">
         <i class="fas fa-dollar-sign"></i> Earning
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="earningsDropdown"> <!-- Changed ID here -->
         <li>
           <a class="nav-link" href="#" onclick="showForm('viewEarning')">View Earnings</a>
         </li>
       </ul>
     </li>

     <!-- Expenses Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#Expenses" role="button"
         aria-expanded="false">
         <i class="bi bi-wallet"></i> Expenses
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="Expenses">
         <li>
           <a class="nav-link" href="#" onclick="showForm('viewExpenses')">View Expenses</a>
         </li>
       </ul>
     </li>

     <!-- Income Statement Dropdown -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#incomeStatementDropdown" role="button"
         aria-expanded="false">
         <i class="bi bi-graph-up"></i> Income Statement
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="incomeStatementDropdown">
         <li>
           <a class="nav-link" href="#" onclick="showForm('viewIncomeStatement')">View Income Statement</a>
         </li>
       </ul>
     </li>

     <!-- Inventory Section -->
     <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">INVENTORY</li>
     <li class="nav-item">
       <a class="nav-link" href="#" onclick="showForm('currentInventory')">
         <i class="bi bi-box-seam"></i> Current Inventory
       </a>
     </li>

     <!-- Breakage Recovery Section -->
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#breakagerecovery" role="button"
         aria-expanded="false">
         <i class="bi bi-clock-history"></i> Breakage Recovery
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="breakagerecovery">
         <li>
           <a class="nav-link" href="#" onclick="showForm('viewRecovery')">View Recovery</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('addbreakage')">Add Breakage</a>
         </li>
       </ul>

       <!-- Logistics Section -->
       <!-- <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">LOGISTICS</li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="showForm('deliverydetails')">
          <i class="bi bi-truck"></i> Purchase Deliveries
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="showForm('saleDeliveries')">
          <i class="bi bi-truck-flatbed"></i> Sale Deliveries
        </a>
      </li> -->

       <!-- HRM Section -->
     <li class="ms-3 mx-3 my-3" id="navbar-catagoeries">HRM</li>
     <li class="nav-item">
       <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#employees" role="button"
         aria-expanded="false">
         <i class="bi bi-people"></i> Employee
         <i class="bi bi-chevron-right arrow"></i>
       </a>
       <ul class="collapse" id="employees">
         <li>
           <a class="nav-link" href="#" onclick="showForm('attendance')">Attendance</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('viewhistory')">History</a>
         </li>
         <li>
           <a class="nav-link" href="#" onclick="showForm('addemployee')">Add Employee</a>
         </li>
       </ul>
     </li>
   </ul>
 </nav>