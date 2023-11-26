<?php
session_start(); // Pokretanje sesije
header('Content-Type: application/json');
include 'db_conn.php';

function createComment($pdo, $blogId, $tekst) {
    $korisnikId = $_SESSION['userID']; // Dohvatanje userID iz sesije

    $sql = "INSERT INTO komentari (blog_id, korisnik_id, tekst) VALUES (?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$blogId, $korisnikId, $tekst]);
        return ["status" => "success", "message" => "Коментар успешно постављен"];
    } catch (PDOException $e) {
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['blogId'], $input['tekst'])) {
    // Provera da li je korisnik ulogovan
    if (!isset($_SESSION['userID'])) {
        echo json_encode(["status" => "error", "message" => "Корисник није улогован!"]);
        exit;
    }

    $response = createComment($pdo, $input['blogId'], $input['tekst']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Погрешан унос"]);
}
?>
