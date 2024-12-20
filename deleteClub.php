<?php
if(isset($_GET['clubID'])) {
    $clubID = $_GET['clubID'];
    
    include './config/db_connection.php';

    $sql = "DELETE FROM club WHERE clubID = $clubID";

    $connection->query($sql);

    session_start();

    $_SESSION['redirected'] = true;

    header('Location: ./addClub.php?clubID=' . $clubID . 'success');
    exit();
}
?>