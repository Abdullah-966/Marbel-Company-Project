<div id="dashboard" class="form-container">
      <div >
          <h1 class="form-section-title text-center">
              Welcome to the dashboard!
          </h1>
      </div>
      <div class="d-flex align-items-center justify-content-center">
          <div class="ms-4" onclick="showSection('dashboardSection')">
              <h5 class="custom-header">Earning</h5>
          </div>
          <div class="ms-4" onclick=" showSection('ordersSection')">
              <h5 class="custom-header">Orders</h5>
          </div>
          <div class="ms-4" onclick=" showSection('expensesSection')">
              <h5 class="custom-header">Expenses</h5>
          </div>
          <!-- <div class="ms-4" onclick="showSection('suppliersSection')">
              <h5 class="custom-header"></h5>
          </div> -->
      </div>
  
      <!-- Chart Sections -->
      <div class="chart-container">
          <!-- Dashboard Section -->
          <div id="dashboardSection" class="graph-section" >
             
              <!-- Chart Section  -->
      <div class="chart-container">
        <!-- Balance section -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="balance">Balance: $74,123</div>
        </div>

        <!-- Expense Summary (Doughnut Chart) -->
        <div class="row">
          <div class="col-md-4">
            <canvas id="expenseSummaryChart"></canvas>
          </div>

          <!-- Profit, Cash in Hand, Monthly Expense, Monthly Earnings (Line Charts) -->
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6">
                <canvas id="profitChart"></canvas>
              </div>
              <div class="col-md-6">
                <canvas id="cashInHandChart"></canvas>
              </div>
              <div class="col-md-6">
                <canvas id="monthlyExpenseChart"></canvas>
              </div>
              <div class="col-md-6">
                <canvas id="monthlyEarningChart"></canvas>
              </div>
            </div>
          </div>
          
</div>
</div>
<!-- end chart section -->
          </div>
  
 <!-- Orders Section -->
 <div id="ordersSection" class="graph-section hidden mt-4">
  <div class="d-flex justify-content-around">
      <div class="d-flex flex-column">
        <canvas id="pendingOrdersChart" width="300" height="300"></canvas>
        <h4 style="margin-left: 20%; margin-top: 5%;">Pending Orders</h4>
      </div>
      <div>
        <canvas id="completedOrdersChart" width="300" height="300"></canvas>
        <h4 style="margin-left: 20%; margin-top: 5%;">Completed Orders</h4>
      </div>
      <div>
        <canvas id="totalOrdersChart" width="300" height="300"></canvas>
        <h4 style="margin-left: 20%; margin-top: 5%;">Total Orders</h4>
      </div>
    </div>
</div>

<!-- end order section -->
  
          <!-- Customers Section -->
          <div id="expensesSection" class="graph-section" style="display: none;">
            <canvas id="factoryExpensesChart" height = "100px" width = "300%"></canvas>
            <h3>Customer Insights</h3>
          </div>
  
          <!-- Suppliers Section
          <div id="suppliersSection" class="graph-section" style="display: none;">
              <h5>Supplier Overview</h5>
              <canvas id="suppliersChart"></canvas>
          </div> -->
      </div>
  </div>
       

</div>
      <!-- end chat section -->