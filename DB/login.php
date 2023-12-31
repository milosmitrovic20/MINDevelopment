<?php
session_start();
header('Content-Type: application/json');
include 'db_conn.php';

function verifyUser($pdo, $identifier, $password) {
    $sql = "SELECT korisnik_id, lozinka FROM korisnici WHERE korisnicko_ime = ? OR email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['lozinka'])) {
        $_SESSION['userID'] = $user['korisnik_id'];
        return ["status" => "success", "message" => "Login successful"];
    } else {
        return ["status" => "error", "message" => "Invalid username/email or password"];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['username'], $input['password'])) {
    $response = verifyUser($pdo, $input['username'], $input['password']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>
