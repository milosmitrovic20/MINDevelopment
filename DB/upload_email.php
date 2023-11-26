<?php
header('Content-Type: application/json');
include 'db_conn.php';

function uploadEmail($pdo, $email) {
    $sql = "INSERT INTO subskrajberi (email) VALUES (?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        return ["status" => "success", "message" => "Email successfully uploaded"];
    } catch (PDOException $e) {
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['email'])) {
    $response = uploadEmail($pdo, $input['email']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>
