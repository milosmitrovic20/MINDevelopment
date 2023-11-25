<?php
header('Content-Type: application/json');
include 'db_conn.php';

function verifyUser($pdo, $username, $password) {
    $sql = "SELECT lozinka FROM korisnici WHERE korisnicko_ime = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['lozinka'])) {
        return ["status" => "success", "message" => "Login successful"];
    } else {
        return ["status" => "error", "message" => "Invalid username or password"];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    $response = verifyUser($pdo, $input['username'], $input['password']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>
