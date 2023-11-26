<?php

// Dobija i podatke o blogu i komentarima radi manjeg API zvanja i brzeg koriscenja

header('Content-Type: application/json');
include 'db_conn.php';

$blogId = isset($_GET['blogId']) ? $_GET['blogId'] : null;

if (!$blogId) {
    echo json_encode(["status" => "error", "message" => "BlogID је неопходан"]);
    exit;
}

try {
    $blogSql = "SELECT * FROM blog WHERE blog_id = ?";
    $blogStmt = $pdo->prepare($blogSql);
    $blogStmt->execute([$blogId]);
    $blog = $blogStmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        echo json_encode(["status" => "error", "message" => "Блог није пронађен"]);
        exit;
    }

    $commentSql = "SELECT komentari.komentar_id, komentari.tekst, komentari.datum_komentara, 
                          korisnici.korisnicko_ime, korisnici.ime, korisnici.prezime
                    FROM komentari
                    INNER JOIN korisnici ON komentari.korisnik_id = korisnici.korisnik_id
                    WHERE komentari.blog_id = ?
                    ORDER BY komentari.datum_komentara DESC";
    $commentStmt = $pdo->prepare($commentSql);
    $commentStmt->execute([$blogId]);
    $comments = $commentStmt->fetchAll(PDO::FETCH_ASSOC);

    $responseData = [
        "blogDetails" => $blog,
        "comments" => $comments
    ];

    echo json_encode(["status" => "success", "data" => $responseData]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
