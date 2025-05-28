<?php
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $campaign_name = mysqli_real_escape_string($conn, $_POST['campaign_name']);
        $channel = mysqli_real_escape_string($conn, $_POST['channel']);
        $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);

        $sql = "INSERT INTO marketing (campaign_name, channel, start_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $campaign_name, $channel, $start_date);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Marketing campaign added successfully']);
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