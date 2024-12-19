<?php
require_once './config/db_connection.php';

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $playerID = $_POST["playerID"];
    $playerPosition = $_POST["playerPosition"];
    $playerName = $_POST["playerName"];
    $playerNationality = $_POST["playerNationality"];
    $playerClub = $_POST["playerClub"];
    $playerPhoto = $_POST["playerPhoto"];
    $playerRating = $_POST["playerRating"];

    $playerPace = !empty($_POST["playerPace"]) ? $_POST["playerPace"] : null;
    $playerShooting = !empty($_POST["playerShooting"]) ? $_POST["playerShooting"] : null;
    $playerPassing = !empty($_POST["playerPassing"]) ? $_POST["playerPassing"] : null;
    $playerDribbling = !empty($_POST["playerDribbling"]) ? $_POST["playerDribbling"] : null;
    $playerDefending = !empty($_POST["playerDefending"]) ? $_POST["playerDefending"] : null;
    $playerPhysical = !empty($_POST["playerPhysical"]) ? $_POST["playerPhysical"] : null;
    $playerDiving = !empty($_POST["playerDiving"]) ? $_POST["playerDiving"] : null;
    $playerHandling = !empty($_POST["playerHandling"]) ? $_POST["playerHandling"] : null;
    $playerKicking = !empty($_POST["playerKicking"]) ? $_POST["playerKicking"] : null;
    $playerReflexes = !empty($_POST["playerReflexes"]) ? $_POST["playerReflexes"] : null;
    $playerSpeed = !empty($_POST["playerSpeed"]) ? $_POST["playerSpeed"] : null;
    $playerPositioning = !empty($_POST["playerPositioning"]) ? $_POST["playerPositioning"] : null;

    do {
        if (empty($playerID) || empty($playerPosition) || empty($playerName) || empty($playerNationality) || empty($playerClub) || empty($playerPhoto) || empty($playerRating)) {
            $errorMessage = "All required fields are mandatory.";
            break;
        }

        $sql = "UPDATE player 
                SET position = ?, playerName = ?, playerImage = ?, nationalityID = ?, clubID = ?, playerPace = ?, playerShooting = ?, playerPassing = ?, 
                    playerDribbling = ?, playerDefending = ?, playerPhysical = ?, playerRating = ?, playerDiving = ?, playerHandling = ?, playerKicking = ?, 
                    playerReflexes = ?, playerSpeed = ?, playerPositioning = ? 
                WHERE playerID = ?";
        $stmt = $connection->prepare($sql);

        $stmt->bind_param("sssiiiiiiiiiiiiiiii", $playerPosition, $playerName, $playerPhoto, $playerNationality, $playerClub, 
                          $playerPace, $playerShooting, $playerPassing, $playerDribbling, $playerDefending, $playerPhysical, 
                          $playerRating, $playerDiving, $playerHandling, $playerKicking, $playerReflexes, $playerSpeed, 
                          $playerPositioning, $playerID);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        } else {
            header('Location: ./editing.php?id=' . $playerID . 'success');
            exit;
        }

    } while (false);
}
?>
