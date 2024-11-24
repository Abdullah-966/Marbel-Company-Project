 <!-- Header -->
 <!-- Header Section -->
 <div class="header">
  <!-- Left Section -->
  <div class="header-left">
    <i class="fas fa-star"></i>
  </div>
  <!-- Middle Section -->
  <div class="header-title">Dashboard</div>
  <!-- Right Section -->
  <div class="header-right">
    <!-- <select id="languageSwitcher" class="form-select form-select-sm" style="
          width: min-content;
          background: center;
          border: none;
          font-size: inherit;
          font-weight: bold;
          padding: 8px 12px;
          margin: auto;
        ">
      <option value="en">EN</option>
    </select> -->
    <i class="far fa-moon" id="themeToggle" onclick="toggleTheme()"></i>
    <i class="fas fa-search"></i>
    <!-- Notification Bell -->
    <div class="notification-container" style="position: relative;">
      <i class="far fa-bell" onclick="toggleNotifications()">
        <span class="notification-badge">5</span>
      </i>
      <!-- Notification Dropdown -->
      <div id="notificationDropdown" class="notification-dropdown hidden">
        <h4 class="dropdown-title text-center text-black">Notifications</h4>
        <ul  class="notification-list">
          <li>
            <div class="notification-content text-black font-size-sm"><span>New order received</span></div>
            <div class="notification-date">2024-11-01</div>
          </li>
          <li>
            <div class="notification-content">Inventory updated</div>
            <div class="notification-date">2024-11-03</div>
          </li>
          <li>
            <div class="notification-content">Employee attendance marked</div>
            <div class="notification-date">2024-11-04</div>
          </li>
          <li>
            <div class="notification-content">Pending invoices cleared</div>
            <div class="notification-date">2024-11-05</div>
          </li>
          <li>
            <div class="notification-content">New customer registered</div>
            <div class="notification-date">2024-11-07</div>
          </li>
          <li>
            <div class="notification-content">Notification Content</div>
            <div class="notification-date">2024-11-08</div>
          </li>
          <li>
            <div class="notification-content">Notification Content</div>
            <div class="notification-date">2024-11-09</div>
          </li>
        </ul>
        <div class="dropdown-footer text-center">
          <button class="btn btn-outline-primary"  id="viewAllBtn">View All</button>
        </div>
      </div>
    </div>
    <div class="d-flex align-items-center">
      <div class="user-info">
        <strong class="text-black">Name</strong>
        <small class="text-black">Admin</small>
      </div>
      <img src="https://via.placeholder.com/40" alt="User Avatar" />
    </div>
  </div>
</div>