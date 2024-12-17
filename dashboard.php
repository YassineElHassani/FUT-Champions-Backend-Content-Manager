<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Dashboard</title>
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
            <a href="dashboard.php" class="active"><i>📊</i> Dashboard</a>
            <a href="addPlayers.php"><i>👥</i> Add Players</a>
            <a href="editPlayers.php"><i>📋</i> Edit Players</a>
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

        <section id="home">
            <div class="dashboardGrid">
                <div class="dashboardCard">
                    <div class="cardHeader">
                        <h3>Total Players</h3>
                        <i>👥</i>
                    </div>
                    <div class="cardValue">254</div>
                </div>

                <div class="dashboardCard">
                    <div class="cardHeader">
                        <h3>Active Clubs</h3>
                        <i>🏆</i>
                    </div>
                    <div class="cardValue">42</div>
                </div>

                <div class="dashboardCard">
                    <div class="cardHeader">
                        <h3>All Potions</h3>
                        <i>📋</i>
                    </div>
                    <div class="cardValue">8</div>
                </div>

                <div class="dashboardCard">
                    <div class="cardHeader">
                        <h3>Recent Transfers</h3>
                        <i>🔄</i>
                    </div>
                    <div class="cardValue">12</div>
                </div>
            </div>

            <table class="tableContainer">
                <thead class="tableHeader">
                    <tr>
                        <th>Position</th>
                        <th>Player Name</th>
                        <th>Nationality</th>
                        <th>Club</th>
                        <th>Pace</th>
                        <th>Shooting</th>
                        <th>Passing</th>
                        <th>Dribbling</th>
                        <th>Defending</th>
                        <th>Physical</th>
                        <th>Rating</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody style="margin-left: 20px;">
                    <?php 
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "futdb";

                        $connection = new mysqli($servername, $username, $password, $database);
                        
                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        $sql = "SELECT playerName, playerImage, playerPace, playerShooting, playerPassing, playerDribbling, playerDefending, playerPhysical, playerRating, clubLogo, nationalityLogo, positionName
                                FROM player 
                                JOIN club ON player.clubID = club.clubID
                                JOIN nationality ON player.nationalityID = nationality.nationalityID
                                JOIN position ON player.playerID = position.positionID;";
                        $result = $connection->query($sql);

                        if(!$result) {
                            die("Invalid query: " . $connection->error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>$row[positionName]</td>
                                <td>$row[playerName]</td>
                                <td><img src="."$row[nationalityLogo]"." height="."30px"." width="."50px"."></td>
                                <td><img src="."$row[clubLogo]"." height="."30px"." width="."50px"."></td>
                                <td>$row[playerPace]</td>
                                <td>$row[playerShooting]</td>
                                <td>$row[playerPassing]</td>
                                <td>$row[playerDribbling]</td>
                                <td>$row[playerDefending]</td>
                                <td>$row[playerPhysical]</td>
                                <td>$row[playerRating]</td>
                                <td><img src="."$row[playerImage]"." height="."30px"." width="."50px"."></td>
                            </tr>
                            ";
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>