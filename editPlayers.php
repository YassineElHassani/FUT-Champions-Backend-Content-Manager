<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Edit Players 📋</title>
    <link rel="stylesheet" href="./style/dashboardStyle.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebarLogo">
            <img src="./src/img/logo.png" alt="Dashboard Logo">
            <h2>FUT Team Builder</h2>
        </div>
        <nav class="sidebarMenu">
            <a href="dashboard.php"><i>📊</i> Dashboard</a>
            <a href="addPlayers.php"><i>👥</i> Add Players</a>
            <a href="editPlayers.php" class="active"><i>📋</i> Edit Players</a>
            <a href="logout.php"><i>↩️</i> Logout</a>
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
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "futdb";

                            $connection = new mysqli($servername, $username, $password, $database);

                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }

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