<?php
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $issue = mysqli_real_escape_string($conn, $_POST['issue']);

        $sql = "INSERT INTO support (customer_name, issue) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $customer_name, $issue);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Support ticket added successfully']);
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