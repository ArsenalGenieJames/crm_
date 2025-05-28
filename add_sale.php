<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [];
    $values = [];

    foreach ($_POST as $key => $value) {
        $fields[] = $key;
        $values[] = "'" . mysqli_real_escape_string($conn, $value) . "'";
    }

    $table = "sales";
    $sql = "INSERT INTO $table (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";

    if (mysqli_query($conn, $sql)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
