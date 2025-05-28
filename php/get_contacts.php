<?php
require_once 'db.php';

try {
    $sql = "SELECT id, name, email, phone, company FROM contacts ORDER BY id DESC";
    $result = $conn->query($sql);
    
    $contacts = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contacts[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'company' => $row['company']
            ];
        }
    }
    
    echo json_encode([
        'status' => 'success',
        'data' => $contacts
    ]);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

$conn->close();
?> 