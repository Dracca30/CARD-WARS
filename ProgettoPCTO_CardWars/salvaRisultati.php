<?php
session_start();
require_once "database.php";
$db = openDBConnection();

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['stats'])) {
    http_response_code(400);
    echo "Dati non validi.";
    exit;
}

foreach ($data['stats'] as $stat) {
    $stmt = $db->prepare("
        UPDATE user_stats 
        SET 
            games_played = games_played + ?, 
            games_won = games_won + ?, 
            games_lost = games_lost + ?, 
            points = points + ? 
        WHERE user_id = ?
    ");
    $stmt->bind_param("iiiii", $stat['played'], $stat['won'], $stat['lost'], $stat['points'], $stat['id']);
    $stmt->execute();
    $stmt->close();
}

$db->close();
echo "OK";
?>
