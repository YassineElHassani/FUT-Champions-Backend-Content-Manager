<?php
if(isset($_GET['id'])) {
    $playerID = $_GET['id'];
    
    require_once './config/db_connection.php';

    $sql = "DELETE FROM player WHERE playerID = $playerID";

    $connection->query($sql);

    session_start();

    $_SESSION['redirected'] = true;

    header('Location: ./editPlayers.php?id=' . $playerID . 'success');
    exit();
}
?>