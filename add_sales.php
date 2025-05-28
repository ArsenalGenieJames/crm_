<?php
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $lead_name = mysqli_real_escape_string($conn, $_POST['lead_name']);
        $deal_value = floatval($_POST['deal_value']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql = "INSERT INTO sales (lead_name, deal_value, status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $lead_name, $deal_value, $status);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Sale added successfully']);
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