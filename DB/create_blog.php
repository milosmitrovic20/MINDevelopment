<?php
session_start(); // Start the session
header('Content-Type: application/json');
include 'db_conn.php';

function createBlogPost($pdo, $naslov, $sadrzaj, $kategorija) {
    $korisnikId = $_SESSION['userID']; // Get userID from session

    $sql = "INSERT INTO blog (korisnik_id, naslov, sadrzaj, kategorija) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$korisnikId, $naslov, $sadrzaj, $kategorija]);
        return ["status" => "success", "message" => "Блог успешно креиран"];
    } catch (PDOException $e) {
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['naslov'], $input['sadrzaj'], $input['kategorija'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['userID'])) {
        echo json_encode(["status" => "error", "message" => "Корисник није улогован!"]);
        exit;
    }
    
    $response = createBlogPost($pdo, $input['naslov'], $input['sadrzaj'], $input['kategorija']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Погрешан унос"]);
}
?>
