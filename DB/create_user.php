<?php
header('Content-Type: application/json');
include 'db_conn.php';

function createUser($pdo, $korisnicko_ime, $lozinka, $ime, $prezime, $email) {
    $sql = "INSERT INTO korisnici (korisnicko_ime, lozinka, ime, prezime, email) VALUES (?, ?, ?, ?, ?)";
    $hashedPassword = password_hash($lozinka, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$korisnicko_ime, $hashedPassword, $ime, $prezime, $email]);
        return ["status" => "success", "message" => "User successfully created"];
    } catch (PDOException $e) {
        // Check if the error is due to a duplicate entry
        $errorInfo = $e->errorInfo;
        if (isset($errorInfo[1]) && $errorInfo[1] == 1062) {
            // Check if the duplicate entry is for korisnicko_ime or email
            if (strpos($errorInfo[2], "'korisnicko_ime'") !== false) {
                return ["status" => "error", "message" => "Username already exists"];
            } elseif (strpos($errorInfo[2], "'email'") !== false) {
                return ["status" => "error", "message" => "Email already exists"];
            }
        }
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    $response = createUser($pdo, $input['korisnicko_ime'], $input['lozinka'], $input['ime'], $input['prezime'], $input['email']);
    echo json_encode($response);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
}
?>
