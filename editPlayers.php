<?php
session_start();
if (isset($_SESSION['redirected']) && $_SESSION['redirected'] === true) {
    $successMessage = "Player deleted successfully";
    unset($_SESSION['redirected']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Edit Players 📋</title>
    <link rel="stylesheet" href="./style/dashboardStyle.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebarLogo">
            <img src="./src/img/logo.png" alt="Dashboard Logo">
            <h2>FUT Team Builder</h2>
        </div>
        <nav class="sidebarMenu">
            <a href="dashboard.php"><i>📊</i><b>Dashboard</b></a>
            <a href="addPlayers.php"><i>👥</i><b>Add Players</b></a>
            <a href="addNationality.php"><i>🚩</i><b>Add Nationality</b></a>
            <a href="addClub.php"><i>🛡️</i><b>Add Club</b></a>
            <a href="editPlayers.php" class="active"><i>📋</i><b>Edit Players</b></a>
            <a href="logout.php"><i>↩️</i><b>Logout</b></a>
        </nav>
    </aside>

    <main class="mainContent">
        <header class="dashboardHeader">
            <h1>FUT Management Dashboard</h1>
            <div class="userProfile">
                <img src="./src/img/admin.jpg" alt="User Avatar">
                <div>
                    <strong>Full Name</strong>
                    <p>Admin</p>
                </div>
            </div>
        </header>

        <?php 
            if(!empty($successMessage)) {
                echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
        ?>

        <section id="editPlayers">
            <div class="table-container">
                <table class="players-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Nationality</th>
                            <th>Club</th>
                            <th>Pace</th>
                            <th>Shooting</th>
                            <th>Passing</th>
                            <th>Dribbling</th>
                            <th>Defending</th>
                            <th>Physical</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include './config/db_connection.php';

                            $sql = "SELECT playerID, position, playerName, playerImage, playerPace, playerShooting, playerPassing, playerDribbling, playerDefending, playerPhysical, playerRating, clubLogo, nationalityLogo
                                    FROM player 
                                    JOIN club ON player.clubID = club.clubID
                                    JOIN nationality ON player.nationalityID = nationality.nationalityID;";
                            $result = $connection->query($sql);

                            if(!$result) {
                                die("Invalid query: " . $connection->error);
                            }

                            while ($row = $result->fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td style='font-weight: bold;'>$row[playerID]</td>
                                        <td style='font-weight: bold;'>$row[position]</td>
                                        <td style='font-weight: bold;'>$row[playerName]</td>
                                        <td><img src='$row[playerImage]' height='30px' width='50px'></td>
                                        <td><img src='$row[nationalityLogo]' height='30px' width='50px'></td>
                                        <td><img src='$row[clubLogo]' height='30px' width='50px'></td>
                                        <td style='font-weight: bold;'>$row[playerPace]</td>
                                        <td style='font-weight: bold;'>$row[playerShooting]</td>
                                        <td style='font-weight: bold;'>$row[playerPassing]</td>
                                        <td style='font-weight: bold;'>$row[playerDribbling]</td>
                                        <td style='font-weight: bold;'>$row[playerDefending]</td>
                                        <td style='font-weight: bold;'>$row[playerPhysical]</td>
                                        <td style='font-weight: bold; color: rgb(41, 25, 185);'>$row[playerRating]</td>
                                        <td>
                                            <div class='flex justify-between'>
                                                <a id='edit' href='editing.php?id=$row[playerID]' class='edit'>✏️</a>
                                                <a id='delete' href='deletePlayer.php?id=$row[playerID]' class='delete'>❌</a>
                                            </div>
                                        </td>
                                    </tr>
                                ";

                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="./script/script.js"></script>
</body>
</html>