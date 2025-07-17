// Frozen Foods Admin Dashboard JavaScript

// Initialize Lucide icons
lucide.createIcons();

// Mobile sidebar toggle
const menuToggle = document.getElementById("menuToggle");
const sidebar = document.getElementById("sidebar");
const closeSidebar = document.getElementById("closeSidebar");
const overlay = document.getElementById("overlay");

menuToggle.addEventListener("click", () => {
  sidebar.classList.remove("-translate-x-full");
  overlay.classList.remove("hidden");
});

closeSidebar.addEventListener("click", () => {
  sidebar.classList.add("-translate-x-full");
  overlay.classList.add("hidden");
});

overlay.addEventListener("click", () => {
  sidebar.classList.add("-translate-x-full");
  overlay.classList.add("hidden");
});

// Initialize Charts
document.addEventListener("DOMContentLoaded", function () {
  // Sales Chart
  const salesCtx = document.getElementById("salesChart").getContext("2d");
  new Chart(salesCtx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [
        {
          label: "Sales",
          data: [12000, 19000, 15000, 25000, 22000, 30000],
          borderColor: "#F97316",
          backgroundColor: "rgba(249, 115, 22, 0.1)",
          borderWidth: 3,
          fill: true,
          tension: 0.4,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "rgba(0, 0, 0, 0.1)",
          },
          ticks: {
            callback: function (value) {
              return "$" + value.toLocaleString();
            },
          },
        },
        x: {
          grid: {
            display: false,
          },
        },
      },
    },
  });

  // Orders Chart
  const ordersCtx = document.getElementById("ordersChart").getContext("2d");
  new Chart(ordersCtx, {
    type: "doughnut",
    data: {
      labels: ["Chicken", "Fish", "Turkey"],
      datasets: [
        {
          data: [45, 35, 20],
          backgroundColor: ["#F97316", "#3B82F6", "#EF4444"],
          borderWidth: 0,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: "bottom",
          labels: {
            usePointStyle: true,
            padding: 20,
          },
        },
      },
    },
  });
});

// Utility functions
function showNotification(message, type = "success") {
  const notification = document.createElement("div");
  notification.className = `notification notification-${type}`;
  notification.innerHTML = `
        <div class="flex items-center">
            <i data-lucide="${
              type === "success"
                ? "check-circle"
                : type === "error"
                ? "x-circle"
                : "info"
            }" class="w-5 h-5 mr-2"></i>
            <span>${message}</span>
        </div>
    `;

  document.body.appendChild(notification);
  lucide.createIcons();

  setTimeout(() => {
    notification.classList.add("show");
  }, 100);

  setTimeout(() => {
    notification.classList.remove("show");
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  }, 3000);
}

// Search functionality
function initializeSearch() {
  const searchInput = document.querySelector('input[placeholder="Search..."]');
  if (searchInput) {
    searchInput.addEventListener("input", function (e) {
      const searchTerm = e.target.value.toLowerCase();
      // Implement search logic here
      console.log("Searching for:", searchTerm);
    });
  }
}

// Initialize search on page load
document.addEventListener("DOMContentLoaded", initializeSearch);

// Responsive table functionality
function makeTablesResponsive() {
  const tables = document.querySelectorAll("table");
  tables.forEach((table) => {
    if (!table.parentElement.classList.contains("table-responsive")) {
      const wrapper = document.createElement("div");
      wrapper.className = "table-responsive";
      table.parentNode.insertBefore(wrapper, table);
      wrapper.appendChild(table);
    }
  });
}

// Auto-refresh data (placeholder)
function autoRefreshData() {
  setInterval(() => {
    // Implement data refresh logic here
    console.log("Refreshing data...");
  }, 30000); // Refresh every 30 seconds
}

// Initialize auto-refresh
document.addEventListener("DOMContentLoaded", autoRefreshData);

// Format currency
function formatCurrency(amount) {
  return new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
  }).format(amount);
}

// Format date
function formatDate(date) {
  return new Intl.DateTimeFormat("en-US", {
    year: "numeric",
    month: "short",
    day: "numeric",
  }).format(new Date(date));
}

// Loading state management
function showLoading(element) {
  element.classList.add("loading");
}

function hideLoading(element) {
  element.classList.remove("loading");
}

// Export functions for use in other files
window.dashboardUtils = {
  showNotification,
  formatCurrency,
  formatDate,
  showLoading,
  hideLoading,
};
