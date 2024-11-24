<!-- history section start-->

<div id="viewhistory" class="form-container hidden">
      <h2 class="form-section-title text-center">History</h2>
  
      <!-- Search Bar -->
      <div class="d-flex align-items-center justify-content-end">
          <input type="text" class="form-control w-25" id="searchCustomer" placeholder="Search" />
          <button class="btn btn-primary mb-3 ms-1">Search</button>
      </div>
  
      <!-- Attendance History Table -->
      <div class="table-responsive">
          <table class="table table-striped">
              <thead>
                  <tr style="text-align: center">
                      <th style="width: 0%">#</th>
                      <th style="width: 10%">Employee Name</th>
                      <th style="width: 10%">Absent</th>
                      <th style="width: 10%">Present</th>
                      <th style="width: 10%">Leave</th>
                      <th style="width: 20%">Total Working Hours</th>
                      <th style="width: 10%">Action</th>
                  </tr>
              </thead>
              <tbody>
                  <tr style="text-align: center">
                      <td>1</td>
                      <td>John Doe</td>
                      <td>1</td>
                      <td>20</td>
                      <td>2</td>
                      <td>160</td>
                      <td>
                          <button class="btn btn-outline-secondary" onclick="viewDetails('John Doe')">View Details</button>
                      </td>
                  </tr>
                  <tr style="text-align: center">
                      <td>2</td>
                      <td>Jane Smith</td>
                      <td>0</td>
                      <td>21</td>
                      <td>1</td>
                      <td>168</td>
                      <td>
                          <button class="btn btn-outline-secondary" onclick="viewDetails('Jane Smith')">View Details</button>
                      </td>
                  </tr>
                  <tr style="text-align: center">
                      <td>3</td>
                      <td>Mark Johnson</td>
                      <td>2</td>
                      <td>19</td>
                      <td>1</td>
                      <td>152</td>
                      <td>
                          <button class="btn btn-outline-secondary" onclick="viewDetails('Mark Johnson')">View Details</button>
                      </td>
                  </tr>
                  <tr style="text-align: center">
                      <td>4</td>
                      <td>Emily Davis</td>
                      <td>0</td>
                      <td>22</td>
                      <td>2</td>
                      <td>176</td>
                      <td>
                          <button class="btn btn-outline-secondary" onclick="viewDetails('Emily Davis')">View Details</button>
                      </td>
                  </tr>
                  <tr style="text-align: center">
                      <td>5</td>
                      <td>Michael Brown</td>
                      <td>1</td>
                      <td>20</td>
                      <td>0</td>
                      <td>160</td>
                      <td>
                          <button class="btn btn-outline-secondary" onclick="viewDetails('Michael Brown')">View Details</button>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>

  <!-- Details View (hidden initially) -->
  <div id="employeeDetails" class="form-container hidden mt-4">
    <h2 class="form-section-title text-center" id="employeeName"></h2>
    <!-- Chart Container -->
    <div id="attendanceChartContainer">
      <canvas id="attendanceChart"></canvas>
  </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center">
                    <th>Date</th>
                    <th>Status</th>
                    <th>Working Hours</th>
                </tr>
            </thead>
            <tbody id="attendanceDetails">
                <!-- Attendance details go here dynamically -->
            </tbody>
        </table>
    </div>
   
</div>

  </div>
    <!-- history section end-->