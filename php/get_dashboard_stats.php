<?php
require_once 'db.php';

try {
    // Get total contacts
    $contacts_query = "SELECT COUNT(*) as total FROM contacts";
    $contacts_result = $conn->query($contacts_query);
    $total_contacts = $contacts_result->fetch_assoc()['total'];

    // Get active accounts
    $accounts_query = "SELECT COUNT(*) as total FROM accounts";
    $accounts_result = $conn->query($accounts_query);
    $active_accounts = $accounts_result->fetch_assoc()['total'];

    // Get closed sales
    $sales_query = "SELECT COUNT(*) as total FROM sales WHERE status = 'Closed Won'";
    $sales_result = $conn->query($sales_query);
    $closed_sales = $sales_result->fetch_assoc()['total'];

    // Get marketing campaigns
    $marketing_query = "SELECT COUNT(*) as total FROM marketing";
    $marketing_result = $conn->query($marketing_query);
    $marketing_campaigns = $marketing_result->fetch_assoc()['total'];

    // Prepare response
    $response = [
        'status' => 'success',
        'data' => [
            'total_contacts' => $total_contacts,
            'active_accounts' => $active_accounts,
            'closed_sales' => $closed_sales,
            'marketing_campaigns' => $marketing_campaigns
        ]
    ];

    echo json_encode($response);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

$conn->close();
?> 