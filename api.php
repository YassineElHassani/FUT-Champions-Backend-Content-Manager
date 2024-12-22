<?php
header("Access-Control-Allow-Origin: *");
include './config/db_connection.php';


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT 
            player.playerID,
            player.playerName,
            player.position,
            player.playerImage,
            player.playerRating,
            player.playerPace,
            player.playerShooting,
            player.playerPassing,
            player.playerDribbling,
            player.playerDefending,
            player.playerPhysical,
            player.playerDiving,
            player.playerHandling,
            player.playerKicking,
            player.playerReflexes,
            player.playerSpeed,
            player.playerPositioning,
            club.clubName,
            club.clubLogo,
            nationality.nationalityName,
            nationality.nationalityLogo
        FROM 
            player
        JOIN 
            club ON player.clubID = club.clubID
        JOIN 
            nationality ON player.nationalityID = nationality.nationalityID;";


$result = $connection->query($sql);

if (!$result) {
    die("Query failed: " . $connection->error);
}

if ($result->num_rows > 0) {
    header('Content-Type: application/json');
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

?>