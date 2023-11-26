<?php
header('Content-Type: application/json');
include 'db_conn.php';

function createUser($pdo, $username, $password, $ime, $prezime, $email) {
    // Generisi rendom broj za sliku za korisnika
    $slika = rand(1, 6);

    $sql = "INSERT INTO korisnici (korisnicko_ime, lozinka, ime, prezime, email, slika) VALUES (?, ?, ?, ?, ?, ?)";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $ime, $prezime, $email, $slika]);
        return ["status" => "success", "message" => "User successfully created"];
    } catch (PDOException $e) {
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    $response = createUser($pdo, $input['username'], $input['password'], $input['ime'], $input['prezime'], $input['email']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>
