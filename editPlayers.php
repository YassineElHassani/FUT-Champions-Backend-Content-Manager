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
            <table class="tableContainer">
                <thead class="tableHeader">
                    <tr>
                        <th>Position</th>
                        <th>Player Name</th>
                        <th>Nationality</th>
                        <th>Club</th>
                        <th>Player Pace</th>
                        <th>Player Shooting</th>
                        <th>Player Passing</th>
                        <th>Player Dribbling</th>
                        <th>Player Defending</th>
                        <th>Player Physical</th>
                        <th>Player Rating</th>
                        <th>Player Image</th>
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

                        $sql = "SELECT * FROM player";
                        $result = $connection->query($sql);

                        if(!$result) {
                            die("Invalid query: " . $connection->error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>$row[positionID]</td>
                                <td>$row[playerName]</td>
                                <td>$row[nationalityID]</td>
                                <td>$row[clubID]</td>
                                <td>$row[playerPace]</td>
                                <td>$row[playerShooting]</td>
                                <td>$row[playerPassing]</td>
                                <td>$row[playerDribbling]</td>
                                <td>$row[playerDefending]</td>
                                <td>$row[playerPhysical]</td>
                                <td>$row[playerRating]</td>
                                <td>$row[playerImage]</td>
                                
                            </tr>
                            ";
                        }
                    ?>
                    <td>
                        <a href="editPlayer.php">Edit</a>
                        <a href="delete.php">delete</a>
                    </td>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>