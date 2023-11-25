<?php
header('Content-Type: application/json');
include 'db_conn.php';

function createBlogPost($pdo, $korisnikId, $naslov, $sadrzaj, $kategorija) {
    $sql = "INSERT INTO blog (korisnik_id, naslov, sadrzaj, kategorija) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$korisnikId, $naslov, $sadrzaj, $kategorija]);
        return ["status" => "success", "message" => "Blog post successfully created"];
    } catch (PDOException $e) {
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    // Ensure that the category is also provided
    if (!isset($input['kategorija'])) {
        echo json_encode(["status" => "error", "message" => "Category is required"]);
        exit;
    }
    $response = createBlogPost($pdo, $input['korisnikId'], $input['naslov'], $input['sadrzaj'], $input['kategorija']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>
