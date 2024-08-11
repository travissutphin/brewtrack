<?php
// Database connection details
$host = 'localhost';
$username = 'thefreek_brewTrack';
$password = '33Jaybell##';
$database = 'thefreek_brewTrack';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all tables in the database
$tables = array();
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array(MYSQLI_NUM)) {
    $tables[] = $row[0];
}

// Drop all tables
if (!empty($tables)) {
    $conn->query('SET foreign_key_checks = 0');
    foreach ($tables as $table) {
        $conn->query("DROP TABLE IF EXISTS `$table`");
    }
    $conn->query('SET foreign_key_checks = 1');
    echo "All tables dropped successfully.\n";
}

// Import SQL
$sql = file_get_contents('/thefreek_brewTrack.sql');

if ($conn->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

if ($conn->error) {
    echo "Error importing SQL: " . $conn->error;
} else {
    echo "Database reset successfully.";
}

$conn->close();
?>