<?php
if(isset($_GET['nationalityID'])) {
    $nationalityID = $_GET['nationalityID'];
    
    include './config/db_connection.php';

    $sql = "DELETE FROM nationality WHERE nationalityID = $nationalityID";

    $connection->query($sql);

    session_start();

    $_SESSION['redirected'] = true;

    header('Location: ./addNationality.php?nationalityID=' . $nationalityID . 'success');
    exit();
}
?>