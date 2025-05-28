<?php
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $metric_name = mysqli_real_escape_string($conn, $_POST['metric_name']);
        $value = mysqli_real_escape_string($conn, $_POST['value']);

        $sql = "INSERT INTO analytics (metric_name, value) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $metric_name, $value);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Analytics data added successfully']);
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