<?php
require_once "database.php";

$conn = openDBConnection();

$sql = "
    SELECT u.username, us.points
    FROM users u
    JOIN user_stats us ON u.id = us.user_id
    ORDER BY us.points DESC
";

$result = $conn->query($sql);

$data = [];
$posizione = 1;
$stessa_posizione = 1;
$punti_prec = null;

while ($row = $result->fetch_assoc()) {
    $punti_corr = $row["points"];

    if ($punti_corr !== $punti_prec) {
        $posizione = $stessa_posizione;
    }

    $data[] = [
        "username"  => $row["username"],
        "posizione" => $posizione,
        "punti"     => $punti_corr
    ];

    $punti_prec = $punti_corr;
    $stessa_posizione++;
}

header("Content-Type: application/json");
echo json_encode($data);

closeDBConnection($conn);

?>