# CRM System - Quick Reference Guide

## 1. System Components

### Frontend
- HTML5 structure (`index.php`)
- JavaScript for UI interactions (`js/script.js`, `js/dashboardoverview.js`)
- CSS styling (`css/style.css`, TailwindCSS)

### Backend
- PHP processing scripts
- MySQL database (`crm_platform`)

## 2. Core Features

### Dashboard
- Real-time metrics display
- Contact count
- Active accounts
- Sales statistics
- Campaign tracking

### Data Management
- Contact records
- Account profiles
- Sales tracking
- Marketing campaigns
- Support tickets

## 3. AJAX Implementation

### Client-Side (JavaScript)
```javascript
// Fetch data
function fetchData() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/get_data.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            updateUI(JSON.parse(xhr.responseText));
        }
    };
    xhr.send();
}

// Update UI
function updateUI(data) {
    document.getElementById('metric').textContent = data.value;
}
```

### Server-Side (PHP)
```php
// Process request
<?php
include 'db.php';
$data = ['value' => getMetric()];
header('Content-Type: application/json');
echo json_encode($data);
?>
```

## 4. Database Connection
```php
$host = "localhost";
$user = "root";
$pass = "";
$db = "crm_platform";
```

## 5. Key Functions

### Data Operations
- Fetch: AJAX GET requests
- Update: Form submissions
- Display: JavaScript DOM updates

### Security
- Input validation
- SQL injection prevention
- XSS protection

## 6. Performance Metrics
- Page load: < 3s
- Data fetch: < 1s
- Form submit: < 2s

## 7. Setup
1. Configure database
2. Start web server
3. Access via browser