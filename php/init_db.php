<?php
require_once 'db.php';


$tables = [
    "CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(20),
        company VARCHAR(100)
    )",
    
    "CREATE TABLE IF NOT EXISTS accounts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        company_name VARCHAR(100),
        industry VARCHAR(100),
        revenue FLOAT
    )",
    
    "CREATE TABLE IF NOT EXISTS sales (
        id INT AUTO_INCREMENT PRIMARY KEY,
        lead_name VARCHAR(100),
        deal_value FLOAT,
        status VARCHAR(50)
    )",
    
    "CREATE TABLE IF NOT EXISTS marketing (
        id INT AUTO_INCREMENT PRIMARY KEY,
        campaign_name VARCHAR(100),
        channel VARCHAR(50),
        start_date DATE
    )",
    
    "CREATE TABLE IF NOT EXISTS support (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_name VARCHAR(100),
        issue TEXT
    )",
    
    "CREATE TABLE IF NOT EXISTS analytics (
        id INT AUTO_INCREMENT PRIMARY KEY,
        metric_name VARCHAR(100),
        value VARCHAR(100)
    )"
];

// Execute each table creation query
foreach ($tables as $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

$conn->close();
?> 