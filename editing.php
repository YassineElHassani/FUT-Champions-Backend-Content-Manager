<?php
require_once './config/db_connection.php';

$successMessage = "";

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $playerID = intval($_GET['id']);

    $query = "SELECT * FROM player JOIN club JOIN nationality WHERE playerID = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $player = $result->fetch_assoc();
    } else {
        echo "Player not found.";
        exit;
    }

    $nationalitiesResult = $connection->query("SELECT * FROM nationality");

    $clubsResult = $connection->query("SELECT * FROM club");

    if(isset($_GET['id']) && $_GET['id'] === $player['playerID'] . 'success'){
        $successMessage = "Player updated successfully";
    }

} else {
    echo "No player ID provided.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Editing ✏️</title>
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
        <section id="addPlayer" class="addPlayer">
            <form id="playerForm" class="space-y-4" action="./updatePlayer.php" method="POST" enctype="multipart/form-data">
                <h2 class="text-xl font-bold mb-4">Edit Player</h2>

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

                <input type="hidden" name="playerID" value="<?= htmlspecialchars($player['playerID']); ?>">

                <div>
                    <label for="playerPosition" class="block mb-2">Position</label>
                    <select id="playerPosition" class="w-full p-2 bg-gray-50 rounded" required name="playerPosition">
                            <option value="<?= htmlspecialchars($player['position']); ?>">
                                <?php echo $player['position']; ?>
                            </option>
                            <option value="GK">(GK) Goalkeeper</option>
                            <option value="LB">(LB) Left Back</option>
                            <option value="LCB">(LCB) Left Center Back</option>
                            <option value="RCB">(RCB) Right Center Back</option>
                            <option value="RB">(RB) Right Back</option>
                            <option value="LCM">(LCM) Left Central Midfielder</option>
                            <option value="CAM">(CAM) Central Attacking Midfielder</option>
                            <option value="RCM">(RCM) Right Central Midfielder</option>
                            <option value="LF">(LF) Left Forward</option>
                            <option value="ST">(ST) Striker</option>
                            <option value="RF">(RF) Right Forward</option>
                    </select>
                </div>

                <div>
                    <label for="playerName" class="block mb-2 mt-[10px]">Player Name</label>
                    <input type="text" id="playerName" name="playerName" placeholder="Player Name" 
                    value="<?= htmlspecialchars($player['playerName']); ?>"
                    class="w-full p-2 bg-gray-50 rounded" required>
                </div>

                <div id="standardFields">
                    <div class="grid grid-cols-2 gap-4">

                        <div class="form-group">
                            <label for="playerNationality" class="block mb-2">Nationality</label>
                            <select id="playerNationality" name="playerNationality" placeholder="Club" class="p-2 w-[100%] bg-gray-50 rounded" required>
                                <?php while ($nationality = $nationalitiesResult->fetch_assoc()): ?>
                                    <option value="<?php echo htmlspecialchars($nationality['nationalityID']); ?>">
                                        <?php echo $nationality['nationalityName']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="playerClub" class="block mb-2">Club</label>
                            <select id="playerClub" name="playerClub" placeholder="Club" class="p-2 w-[100%] bg-gray-50 rounded" required>
                                <?php while ($club = $clubsResult->fetch_assoc()): ?>
                                    <option value="<?php echo htmlspecialchars($club['clubID']); ?>">
                                        <?php echo $club['clubName']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div>
                            <label for="playerPhoto" class="block mb-2">Photo URL</label>
                            <input type="text" value="<?= htmlspecialchars($player['playerImage']); ?>" id="playerPhoto" name="playerPhoto" placeholder="Photo URL" class="p-2 w-[100%] bg-gray-50 rounded" required/>
                        </div>

                        <div>
                            <label for="playerRating" class="block mb-2">Rating</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerRating']); ?>" id="playerRating" name="playerRating" placeholder="Rating" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                    </div>


                    <div id="standardPlayer" class="grid grid-cols-3 gap-2 mt-4">
                        <div>
                            <label for="playerPace" class="block mb-2">Pace</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerPace']); ?>" id="playerPace" name="playerPace" placeholder="Pace" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerShooting" class="block mb-2">Shooting</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerShooting']); ?>" id="playerShooting" name="playerShooting" placeholder="Shooting" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerPassing" class="block mb-2">Passing</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerPassing']); ?>" id="playerPassing" name="playerPassing" placeholder="Passing" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerDribbling" class="block mb-2">Dribbling</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerDribbling']); ?>" id="playerDribbling" name="playerDribbling" placeholder="Dribbling" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerDefending" class="block mb-2">Defending</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerDefending']); ?>" id="playerDefending" name="playerDefending" placeholder="Defending" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerPhysical" class="block mb-2">Physical</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerPhysical']); ?>" id="playerPhysical" name="playerPhysical" placeholder="Physical" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                    </div>
                </div>

                <div id="gkFields" class="hidden">
                    <div class="grid grid-cols-3 gap-2 mt-4">
                        <div>
                            <label for="playerDiving" class="block mb-2">Diving</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerDiving']); ?>" id="playerDiving" name="playerDiving" placeholder="Diving" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerHandling" class="block mb-2">Handling</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerHandling']); ?>" id="playerHandling" name="playerHandling" placeholder="Handling" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerKicking" class="block mb-2">Kicking</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerKicking']); ?>" id="playerKicking" name="playerKicking" placeholder="Kicking" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerReflexes" class="block mb-2">Reflexes</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerReflexes']); ?>" id="playerReflexes" name="playerReflexes" placeholder="Reflexes" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerSpeed" class="block mb-2">Speed</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerSpeed']); ?>" id="playerSpeed" name="playerSpeed" placeholder="Speed" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerPositioning" class="block mb-2">Positioning</label>
                            <input type="number" value="<?= htmlspecialchars($player['playerPositioning']); ?>" id="playerPositioning" name="playerPositioning" placeholder="Positioning" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="submit" id="submitBtn">Save</button>
                    <button id="cancelBtn"><a href="./editPlayers.php" style="text-decoration: none;">Cancel</a></button>
                </div>
            </form>
        </section>
    </main>
    <script src="./script/script.js"></script>
</body>
</html>