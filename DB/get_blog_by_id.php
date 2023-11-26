<?php
header('Content-Type: application/json');
include 'db_conn.php';

// Get the blogId from the query string
$blogId = isset($_GET['blogId']) ? $_GET['blogId'] : null;

if (!$blogId) {
    echo json_encode(["status" => "error", "message" => "Blog ID is required"]);
    exit;
}

try {
    // Fetch the blog details
    $blogSql = "SELECT * FROM blog WHERE blog_id = ?";
    $blogStmt = $pdo->prepare($blogSql);
    $blogStmt->execute([$blogId]);
    $blog = $blogStmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        echo json_encode(["status" => "error", "message" => "Blog not found"]);
        exit;
    }

    // Fetch the comments for the blog
    $commentSql = "SELECT * FROM komentari WHERE blog_id = ? ORDER BY datum_komentara DESC";
    $commentStmt = $pdo->prepare($commentSql);
    $commentStmt->execute([$blogId]);
    $comments = $commentStmt->fetchAll(PDO::FETCH_ASSOC);

    // Combine blog details and comments in the response
    $responseData = [
        "blogDetails" => $blog,
        "comments" => $comments
    ];

    echo json_encode(["status" => "success", "data" => $responseData]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
