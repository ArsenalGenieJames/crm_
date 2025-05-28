// Function to update dashboard statistics
function updateDashboardStats() {
    fetch('php/get_dashboard_stats.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.querySelector('.stat-card:nth-child(1) .number').textContent = data.data.total_contacts;
                document.querySelector('.stat-card:nth-child(2) .number').textContent = data.data.active_accounts;
                document.querySelector('.stat-card:nth-child(3) .number').textContent = data.data.closed_sales;
                document.querySelector('.stat-card:nth-child(4) .number').textContent = data.data.marketing_campaigns;
            } else {
                console.error('Error fetching dashboard stats:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Update stats when page loads
document.addEventListener('DOMContentLoaded', function() {
    updateDashboardStats();
    
    // Update stats every 30 seconds
    setInterval(updateDashboardStats, 30000);
});


// Tab switching functionality
document.querySelectorAll('.tab-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all tabs and sections
        document.querySelectorAll('.tab-link').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('main section').forEach(section => section.classList.remove('active'));
        
        // Add active class to clicked tab and corresponding section
        this.classList.add('active');
        const tabId = this.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
        
        // Update dashboard stats when switching to dashboard tab
        if (tabId === 'dashboard') {
            updateDashboardStats();
        }
    });
});