<?php
header('Content-Type: application/json');
include 'db_conn.php';

try {
    $sql = "SELECT * FROM blog";
    $stmt = $pdo->query($sql);
    
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["status" => "success", "data" => $blogs]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
