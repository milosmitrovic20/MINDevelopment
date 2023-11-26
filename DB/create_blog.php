<?php
session_start();
header('Content-Type: application/json');
include 'db_conn.php';

function createBlogPost($pdo, $naslov, $sadrzaj, $kategorija) {
    $korisnikId = $_SESSION['userID'];

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
