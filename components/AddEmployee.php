<!-- add employee section starts-->

<div id="addemployee" class="form-container hidden">
      <h2 class="form-section-title text-center">Add Employee</h2>
      <form action="submit_employee.php" method="POST">
        <div class="row mb-3">
          <div class="form-group col-md-6">
            <label for="employee_name" class="form-label">Employee Name:</label>
            <input type="text" id="employee_name" name="employee_name" class="form-control"
              placeholder="Enter employee name" required />
          </div>
          <div class="form-group col-md-6">
            <label for="contact_number" class="form-label">Contact Number:</label>
            <input type="tel" id="contact_number" name="contact_number" class="form-control"
              placeholder="Enter contact number" required />
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-group col-md-6">
            <label for="address" class="form-label">Address:</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" required />
          </div>
          <div class="form-group col-md-6">
            <label for="age" class="form-label">Age:</label>
            <input type="number" id="age" name="age" class="form-control" placeholder="Enter age" required />
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-group col-md-6">
            <label for="joining_date" class="form-label">Joining Date:</label>
            <input type="date" id="joining_date" name="joining_date" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-control" required>
              <option value="Active" selected>Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-group col-md-6">
            <label for="cnic_number" class="form-label">CNIC:</label>
            <input type="text" id="cnic_number" name="cnic_number" class="form-control" placeholder="xxxxx-xxxxxxxxx-x" required/>
          </div>
          <div class="form-group col-md-6">
            <label for="cnic_pic" class="form-label">CNIC Pic:</label>
            <input type="file" id="cnic_pic" name="cnic_pic" class="form-control" required/>
            </select>
          </div>
        </div>
        <input type="submit" value="Add Employee" class="btn btn-outline-primary w-100 mb-3 p-2" />
      </form>
    </div>

    <!-- add employee section ends-->