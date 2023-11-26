<?php
session_start(); // Start the session
header('Content-Type: application/json');
include 'db_conn.php';

function getCommentsByBlogId($pdo, $blogId) {
    $sql = "SELECT komentari.komentar_id, komentari.tekst, komentari.datum_komentara, korisnici.korisnicko_ime
            FROM komentari
            INNER JOIN korisnici ON komentari.korisnik_id = korisnici.korisnik_id
            WHERE komentari.blog_id = ?
            ORDER BY komentari.datum_komentara DESC";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$blogId]);
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ["status" => "success", "comments" => $comments];
    } catch (PDOException $e) {
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['blogId'])) {
    $response = getCommentsByBlogId($pdo, $input['blogId']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Погрешан унос"]);
}
?>
