<?php
header('Content-Type: application/json');
include 'db_conn.php';

$blogId = isset($_GET['blogId']) ? $_GET['blogId'] : null;

if (!$blogId) {
    echo json_encode(["status" => "error", "message" => "BlogID је неопходан"]);
    exit;
}

try {
    // Fetch blog details
    $blogSql = "SELECT * FROM blog WHERE blog_id = ?";
    $blogStmt = $pdo->prepare($blogSql);
    $blogStmt->execute([$blogId]);
    $blog = $blogStmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        echo json_encode(["status" => "error", "message" => "Блог није пронађен"]);
        exit;
    }

    // Fetch author details from korisnici table
    $authorSql = "SELECT korisnici.ime, korisnici.prezime, korisnici.korisnicko_ime
                  FROM korisnici
                  WHERE korisnici.korisnik_id = ?";
    $authorStmt = $pdo->prepare($authorSql);
    $authorStmt->execute([$blog['korisnik_id']]);
    $author = $authorStmt->fetch(PDO::FETCH_ASSOC);

    // Fetch comments
    $commentSql = "SELECT komentari.komentar_id, komentari.tekst, komentari.datum_komentara, korisnici.korisnicko_ime
                    FROM komentari
                    INNER JOIN korisnici ON komentari.korisnik_id = korisnici.korisnik_id
                    WHERE komentari.blog_id = ?
                    ORDER BY komentari.datum_komentara DESC";
    $commentStmt = $pdo->prepare($commentSql);
    $commentStmt->execute([$blogId]);
    $comments = $commentStmt->fetchAll(PDO::FETCH_ASSOC);

    $responseData = [
        "blogDetails" => $blog,
        "author" => $author,
        "comments" => $comments
    ];

    echo json_encode(["status" => "success", "data" => $responseData]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
