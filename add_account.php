<?php
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
        $industry = mysqli_real_escape_string($conn, $_POST['industry']);
        $revenue = floatval($_POST['revenue']);

        $sql = "INSERT INTO accounts (company_name, industry, revenue) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssd", $company_name, $industry, $revenue);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Account added successfully']);
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    
    $conn->close();
    exit();
}
?>