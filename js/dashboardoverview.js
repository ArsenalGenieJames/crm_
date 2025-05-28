// Function to fetch and display contacts
function loadContacts() {
    fetch('php/get_contacts.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const tbody = document.querySelector('#contact-list table tbody');
                tbody.innerHTML = ''; // Clear existing rows
                
                data.data.forEach(contact => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${contact.id}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${contact.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${contact.email}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${contact.phone}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${contact.company}</td>
                    `;
                    tbody.appendChild(row);
                });
            } else {
                console.error('Error loading contacts:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Function to update dashboard statistics
function updateDashboardStats() {
    fetch('php/get_dashboard_stats.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById('total-contacts-number').textContent = data.data.total_contacts;
                document.getElementById('active-accounts-number').textContent = data.data.active_accounts;
                document.getElementById('sales-closed-number').textContent = data.data.closed_sales;
                document.getElementById('marketing-campaigns-number').textContent = data.data.marketing_campaigns;
            } else {
                console.error('Error fetching dashboard stats:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Load data when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadContacts();
    updateDashboardStats();
    
    // Update data every 30 seconds
    setInterval(() => {
        loadContacts();
        updateDashboardStats();
    }, 30000);
});

// Add event listener for contact form submission
document.querySelector('form[action="add_contact.php"]').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('add_contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Reload contacts after successful addition
            loadContacts();
            // Clear form
            this.reset();
        } else {
            console.error('Error adding contact:', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});