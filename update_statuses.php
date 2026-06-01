<?php
// Direct database update script

$host = 'localhost';
$db = 'findit';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Update lost items with claimed status to returned
    $stmt = $pdo->prepare("UPDATE item SET status = 'returned' WHERE type = 'lost' AND status = 'claimed'");
    $stmt->execute();
    $updatedRows = $stmt->rowCount();
    
    echo "Database updated successfully!\n";
    echo "Rows updated: " . $updatedRows . "\n";
    echo "\nItem status breakdown:\n";
    
    // Get counts
    $stmt = $pdo->query("SELECT status, type, COUNT(*) as count FROM item GROUP BY status, type");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "  Type: {$row['type']}, Status: {$row['status']}, Count: {$row['count']}\n";
    }
    
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}
