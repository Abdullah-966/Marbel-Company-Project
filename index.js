// Expense and Profit Charts Setup
function createExpenseSummaryChart() {
  const ctxExpense = document.getElementById("expenseSummaryChart").getContext("2d");
  return new Chart(ctxExpense, {
    type: "doughnut",
    data: {
      labels: ["Labour Expense", "Cutting Blades"],
      datasets: [{
        data: [79, 20],
        backgroundColor: ["#FFD700", "#00CED1"],
        hoverBackgroundColor: ["#FFC700", "#00BEBF"],
      }],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "bottom",
        },
      },
    },
  });
}

function createLineChart(elementId, label, dataPoints) {
  const ctx = document.getElementById(elementId).getContext("2d");
  return new Chart(ctx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [{
        label: label,
        data: dataPoints,
        backgroundColor: "#00CED1",
        borderColor: "#00CED1",
        fill: false,
      }],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
      },
    },
  });
}

// Initializing Charts
function initializeDashboardCharts() {
  createExpenseSummaryChart();
  createLineChart("profitChart", "Profit", [600, 620, 640, 660, 678, 678]);
  createLineChart("cashInHandChart", "Cash in Hand", [600, 620, 640, 660, 678, 678]);
  createLineChart("monthlyExpenseChart", "Monthly Expense", [600, 620, 640, 660, 678, 678]);
  createLineChart("monthlyEarningChart", "Monthly Earning", [600, 620, 640, 660, 678, 678]);
}

// Factory Expenses Chart Setup
function createFactoryExpensesChart() {
  const ctx = document.getElementById("factoryExpensesChart").getContext("2d");

  const labels = ["Electricity", "Labor", "Purchases", "Breakage", "Maintenance"];
  const data = {
    labels: labels,
    datasets: [{
      label: "Expenses ($)",
      data: [1200, 3000, 4500, 600, 800, 1500, 500],
      backgroundColor: "rgba(75, 192, 192, 0.6)",
      borderColor: "rgba(75, 192, 192, 1)",
      borderWidth: 1,
    }],
  };

  const options = {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: "Expenses ($)",
        },
      },
      x: {
        title: {
          display: true,
          text: "Expense Categories",
        },
      },
    },
    plugins: {
      legend: {
        position: "top",
      },
    },
  };

  new Chart(ctx, {
    type: "bar",
    data: data,
    options: options,
  });
}

// Orders Charts
let ordersChartsInitialized = false;

function createOrdersCharts() {
  if (ordersChartsInitialized) return;

  new Chart(document.getElementById("pendingOrdersChart").getContext("2d"), {
    type: "doughnut",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May"],
      datasets: [{
        label: "Pending Orders",
        data: [5, 10, 15, 20, 25],
        backgroundColor: "#FFD700",
      }],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "bottom",
        },
      },
    },
  });

  new Chart(document.getElementById("completedOrdersChart").getContext("2d"), {
    type: "doughnut",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May"],
      datasets: [{
        label: "Completed Orders",
        data: [10, 12, 18, 22, 28],
        backgroundColor: "#00CED1",
      }],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "bottom",
        },
      },
    },
  });

  new Chart(document.getElementById("totalOrdersChart").getContext("2d"), {
    type: "doughnut",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May"],
      datasets: [{
        label: "Total Orders",
        data: [15, 22, 33, 42, 53],
        backgroundColor: "#9370DB",
      }],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "bottom",
        },
      },
    },
  });

  ordersChartsInitialized = true;
}

// Initialize All Charts on Page Load
document.addEventListener("DOMContentLoaded", () => {
  initializeDashboardCharts();
  createFactoryExpensesChart();
});

// Form Calculation for Total Price
document.getElementById('unitPrice').addEventListener('input', calculateTotalPrice);
document.getElementById('quantityType').addEventListener('change', calculateTotalPrice);
document.getElementById('quantityFeet').addEventListener('input', calculateTotalPrice);
document.getElementById('quantityInches').addEventListener('input', calculateTotalPrice);
document.getElementById('quantityDimensions').addEventListener('input', calculateTotalPrice);

function calculateTotalPrice() {
    const unitPrice = parseFloat(document.getElementById('unitPrice').value) || 0;
    let totalSqFt = 0;

    const quantityType = document.getElementById('quantityType').value;
    if (quantityType === 'feet') {
        totalSqFt = parseFloat(document.getElementById('quantityFeet').value) || 0;
    } else if (quantityType === 'inches') {
        totalSqFt = (parseFloat(document.getElementById('quantityInches').value) || 0) / 12;
    } else if (quantityType === 'dimensions') {
        const dimensions = document.getElementById('quantityDimensions').value.match(/^(\d+)x(\d+)$/);
        if (dimensions) {
            totalSqFt = parseFloat(dimensions[1]) * parseFloat(dimensions[2]);
        }
    }

    document.getElementById('totalPrice').value = (totalSqFt * unitPrice).toFixed(2);
}

// Attendance and Employee Details
function viewDetails(employeeName) {
  const attendanceData = {
    "John Doe": [
      { date: "2024-11-01", status: "Present", hours: 8 },
      { date: "2024-11-02", status: "Absent", hours: 0 },
    ],
  };

  displayAttendanceDetails(employeeName, attendanceData[employeeName] || []);
}

function displayAttendanceDetails(employeeName, details) {
  const tbody = document.getElementById("attendanceDetails");
  document.getElementById("employeeName").innerText = `${employeeName} - Attendance Details`;
  tbody.innerHTML = details.map(entry => `
    <tr style="text-align: center">
      <td>${entry.date}</td>
      <td>${entry.status}</td>
      <td>${entry.hours}</td>
    </tr>
  `).join('');
  document.getElementById("employeeDetails").classList.remove("hidden");
  createAttendanceChart(details);
}

function createAttendanceChart(details) {
  const today = new Date();
  const daysInMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate();
  const labels = Array.from({ length: daysInMonth }, (_, i) => `2024-11-${String(i + 1).padStart(2, '0')}`);
  const data = labels.map(date => (details.find(d => d.date === date)?.hours || null));

  const chartContainer = document.getElementById("attendanceChartContainer");
  chartContainer.innerHTML = '<canvas id="attendanceChart"></canvas>';
  const ctx = document.getElementById("attendanceChart").getContext('2d');

  new Chart(ctx, {
    type: "bar",
    data: {
      labels,
      datasets: [{
        label: "Working Hours",
        data,
        backgroundColor: "rgba(54, 162, 235, 0.2)",
        borderColor: "rgba(54, 162, 235, 1)",
      }],
    },
    options: {
      scales: {
        y: { beginAtZero: true, title: { display: true, text: "Hours Worked" } },
        x: { title: { display: true, text: "Date" } },
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: context => context.raw !== null ? `${context.raw} Hours` : "No Data",
          },
        },
      },
    },
  });
}

// Notifications and Theme Toggle
function populateNotifications(notifications) {
  const notificationList = document.querySelector(".notification-list");
  notificationList.innerHTML = notifications.map(notification => `
    <li>
      <div class="notification-content">${notification.content}</div>
      <div class="notification-date">${notification.date}</div>
    </li>
  `).join('');
}

function toggleTheme() {
  const body = document.body;
  const themeToggleIcon = document.getElementById("themeToggle");

  body.classList.toggle("dark-mode");
  themeToggleIcon.classList.toggle("fa-sun");
  themeToggleIcon.classList.toggle("fa-moon");

  const theme = body.classList.contains("dark-mode") ? "dark" : "light";
  localStorage.setItem("theme", theme);
}

document.querySelector(".far.fa-moon").addEventListener("click", toggleTheme);

// Show Section
function showSection(sectionId) {
  document.querySelectorAll(".graph-section").forEach(section => section.style.display = "none");
  const selectedSection = document.getElementById(sectionId);
  selectedSection.style.display = "block";

  if (sectionId === "ordersSection") {
    createOrdersCharts();
  } else if (sectionId === "dashboardSection") {
    initializeDashboardCharts();
  }
}
function showForm(formId) {
  console.log("formId received:", formId);

  // Hide all forms
  const allContainers = document.querySelectorAll(".form-container");
  allContainers.forEach(container => container.classList.add("hidden"));

  // Get the target form
  const targetForm = document.getElementById(formId);

  // Handle case where the form does not exist
  if (!targetForm) {
    console.error(`Form with id "${formId}" not found.`);
    return;
  }

  // Show the target form
  targetForm.classList.remove("hidden");
  console.log("Showing form:", targetForm);
}