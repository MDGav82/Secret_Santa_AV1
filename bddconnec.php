<?php
$pdo = new PDO("mysql:host=localhost;dbname=secret_santa", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $stmt = $pdo->query("SELECT nom FROM data WHERE idUtilisateur !=(SELECT idCible from data) ORDER BY RAND() LIMIT 1;)

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No rows found with NULL idCible"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "Database query failed: " . $e->getMessage()]);
}
?>
