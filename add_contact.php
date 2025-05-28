<?php
require_once 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $company = mysqli_real_escape_string($conn, $_POST['company']);

        $sql = "INSERT INTO contacts (name, email, phone, company) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $phone, $company);

        if ($stmt->execute()) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Contact added successfully',
                'id' => $conn->insert_id
            ]);
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
    
    $conn->close();
    exit();
}
?>
