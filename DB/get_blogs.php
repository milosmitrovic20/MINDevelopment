<?php
header('Content-Type: application/json');
include 'db_conn.php';

try {
    $sql = "SELECT blog.*, korisnici.slika AS autor_slika, korisnici.korisnicko_ime AS autor_korisnicko_ime
            FROM blog
            INNER JOIN korisnici ON blog.korisnik_id = korisnici.korisnik_id";
    $stmt = $pdo->query($sql);
    
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["status" => "success", "data" => $blogs]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
