<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "futdb";

$connection = new mysqli($servername, $username, $password, $database);

$playerPosition = "";
$playerName = "";
$playerNationality = "";
$playerClub = "";
$playerPhoto = "";
$playerRating = "";
$playerPace = "";
$playerShooting = "";
$playerPassing = "";
$playerDribbling = "";
$playerDefending = "";
$playerPhysical = "";
$playerDiving = "";
$playerHandling = "";
$playerKicking = "";
$playerReflexes = "";
$playerSpeed = "";
$playerPositioning = "";

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $playerPosition = $_POST["playerPosition"];
    $playerName = $_POST["playerName"];
    $playerNationality = $_POST["playerNationality"];
    $playerClub = $_POST["playerClub"];
    $playerPhoto = $_POST["playerPhoto"];
    $playerRating = $_POST["playerRating"];
    
    $playerPace = !empty($_POST["playerPace"]) ? $_POST["playerPace"] : "NULL";
    $playerShooting = !empty($_POST["playerShooting"]) ? $_POST["playerShooting"] : "NULL";
    $playerPassing = !empty($_POST["playerPassing"]) ? $_POST["playerPassing"] : "NULL";
    $playerDribbling = !empty($_POST["playerDribbling"]) ? $_POST["playerDribbling"] : "NULL";
    $playerDefending = !empty($_POST["playerDefending"]) ? $_POST["playerDefending"] : "NULL";
    $playerPhysical = !empty($_POST["playerPhysical"]) ? $_POST["playerPhysical"] : "NULL";
    $playerDiving = !empty($_POST["playerDiving"]) ? $_POST["playerDiving"] : "NULL";
    $playerHandling = !empty($_POST["playerHandling"]) ? $_POST["playerHandling"] : "NULL";
    $playerKicking = !empty($_POST["playerKicking"]) ? $_POST["playerKicking"] : "NULL";
    $playerReflexes = !empty($_POST["playerReflexes"]) ? $_POST["playerReflexes"] : "NULL";
    $playerSpeed = !empty($_POST["playerSpeed"]) ? $_POST["playerSpeed"] : "NULL";
    $playerPositioning = !empty($_POST["playerPositioning"]) ? $_POST["playerPositioning"] : "NULL";

    do {
        if (empty($playerPosition) || empty($playerName) || empty($playerNationality) || empty($playerClub) || empty($playerPhoto) || empty($playerRating)) {
            $errorMessage = "All the required fields are mandatory.";
            break;
        }

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $sql = "INSERT INTO player (
            positionID, playerName, nationalityID, clubID, playerPace, playerShooting, playerPassing, playerDribbling, 
            playerDefending, playerPhysical, playerImage, playerRating, playerDiving, playerHandling, playerKicking, 
            playerReflexes, playerSpeed, playerPositioning
        ) VALUES (
            $playerPosition, '$playerName', $playerNationality, $playerClub, $playerPace, $playerShooting, $playerPassing, 
            $playerDribbling, $playerDefending, $playerPhysical, '$playerPhoto', $playerRating, $playerDiving, 
            $playerHandling, $playerKicking, $playerReflexes, $playerSpeed, $playerPositioning
        )";

        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $playerPosition = "";
        $playerName = "";
        $playerNationality = "";
        $playerClub = "";
        $playerPhoto = "";
        $playerRating = "";
        $playerPace = "";
        $playerShooting = "";
        $playerPassing = "";
        $playerDribbling = "";
        $playerDefending = "";
        $playerPhysical = "";
        $playerDiving = "";
        $playerHandling = "";
        $playerKicking = "";
        $playerReflexes = "";
        $playerSpeed = "";
        $playerPositioning = "";

        $successMessage = "Player added successfully.";

    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Add Players 👥</title>
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
            <a href="addPlayers.php" class="active"><i>👥</i> Add Players</a>
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
        <section id="addPlayer" class="addPlayer">
            <form id="playerForm" class="space-y-4" method="POST">
                <h2 class="text-xl font-bold mb-4">Add Player</h2>
                

                <?php 
                
                if(!empty($errorMessage)) {
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                }
                
                ?>

                <?php 
                    if(!empty($successMessage)) {
                        echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>

                <div>
                    <label for="playerPosition" class="block mb-2">Position</label>
                    <select id="playerPosition" class="w-full p-2 bg-gray-50 rounded" required name="playerPosition">
                        <option value="1">(GK) Goalkeeper</option>
                        <option value="2">(LB) Left Back</option>
                        <option value="3">(LCB) Left Center Back</option>
                        <option value="4">(RCB) Right Center Back</option>
                        <option value="5">(RB) Right Back</option>
                        <option value="6">(LCM) Left Central Midfielder</option>
                        <option value="7">(CAM) Central Attacking Midfielder</option>
                        <option value="8">(RCM) Right Central Midfielder</option>
                        <option value="9">(LF) Left Forward</option>
                        <option value="10">(ST) Striker</option>
                        <option value="11">(RF) Right Forward</option>
                    </select>
                      
                    <div>
                        <label for="playerName" class="block mb-2 mt-[10px]">Player Name</label>
                        <input type="text" id="playerName" name="playerName" placeholder="Player Name" class="w-full p-2 bg-gray-50 rounded" required>
                    </div>
                </div>

                <div id="standardFields">
                    <div class="grid grid-cols-2 gap-4">

                        <div class="form-group">
                            <label for="playerNationality" class="block mb-2">Nationality</label>
                            <select id="playerNationality" name="playerNationality" placeholder="Club" class="p-2 w-[100%] bg-gray-50 rounded" required>
                                <option value="">Select a Country</option>
                                    <option value="1">Brazil</option>
                                    <option value="2">Argentina</option>
                                    <option value="3">Germany</option>
                                    <option value="4">Spain</option>
                                    <option value="5">France</option>
                                    <option value="6">Italy</option>
                                    <option value="7">Morocco</option>
                                    <option value="8">England</option>
                                    <option value="9">Portugal</option>
                                    <option value="10">Switzerland</option>
                                    <option value="11">Belgium</option>
                                    <option value="12">United States</option>
                                    <option value="13">Croatia</option>
                                    <option value="14">Sweden</option>
                                    <option value="15">Colombia</option>
                                    <option value="16">Mexico</option>
                                    <option value="17">Uruguay</option>
                                    <option value="18">Chile</option>
                                    <option value="19">Denmark</option>
                                    <option value="20">Japan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="playerClub" class="block mb-2">Club</label>
                            <select id="playerClub" name="playerClub" placeholder="Club" class="p-2 w-[100%] bg-gray-50 rounded" required>
                                <option value="">Select a Club</option>
                                    <option value="1">FC Barcelona</option>
                                    <option value="2">Manchester United</option>
                                    <option value="3">Real Madrid</option>
                                    <option value="4">Atlético de Madrid</option>
                                    <option value="5">Arsenal</option>
                                    <option value="6">Bayern Munich</option>
                                    <option value="7">Juventus</option>
                                    <option value="8">Chelsea</option>
                                    <option value="9">PSG</option>
                                    <option value="10">AC Milan</option>
                                    <option value="11">Liverpool</option>
                                    <option value="12">Manchester City</option>
                                    <option value="13">Inter Milan</option> 
                                    <option value="14">Southampton</option>
                                    <option value="15">Borussia Dortmund</option>
                                    <option value="16">RB Leipzig</option>
                                    <option value="17">Schalke 04</option>
                                    <option value="18">AS Roma</option>
                            </select>
                        </div>

                        <div>
                            <label for="playerPhoto" class="block mb-2">Photo URL</label>
                            <input type="text" id="playerPhoto" name="playerPhoto" placeholder="Photo URL" class="p-2 w-[100%] bg-gray-50 rounded" required/>
                        </div>

                        <div>
                            <label for="playerRating" class="block mb-2">Rating</label>
                            <input type="number" id="playerRating" name="playerRating" placeholder="Rating" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                    </div>


                    <div id="standardPlayer" class="hidden grid grid-cols-3 gap-2 mt-4">
                        <div>
                            <label for="playerPace" class="block mb-2">Pace</label>
                            <input type="number" id="playerPace" name="playerPace" placeholder="Pace" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerShooting" class="block mb-2">Shooting</label>
                            <input type="number" id="playerShooting" name="playerShooting" placeholder="Shooting" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerPassing" class="block mb-2">Passing</label>
                            <input type="number" id="playerPassing" name="playerPassing" placeholder="Passing" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerDribbling" class="block mb-2">Dribbling</label>
                            <input type="number" id="playerDribbling" name="playerDribbling" placeholder="Dribbling" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerDefending" class="block mb-2">Defending</label>
                            <input type="number" id="playerDefending" name="playerDefending" placeholder="Defending" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerPhysical" class="block mb-2">Physical</label>
                            <input type="number" id="playerPhysical" name="playerPhysical" placeholder="Physical" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                    </div>
                </div>

                <div id="gkFields">
                    <div class="grid grid-cols-3 gap-2 mt-4">
                        <div>
                            <label for="playerDiving" class="block mb-2">Diving</label>
                            <input type="number" id="playerDiving" name="playerDiving" placeholder="Diving" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerHandling" class="block mb-2">Handling</label>
                            <input type="number" id="playerHandling" name="playerHandling" placeholder="Handling" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerKicking" class="block mb-2">Kicking</label>
                            <input type="number" id="playerKicking" name="playerKicking" placeholder="Kicking" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerReflexes" class="block mb-2">Reflexes</label>
                            <input type="number" id="playerReflexes" name="playerReflexes" placeholder="Reflexes" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerSpeed" class="block mb-2">Speed</label>
                            <input type="number" id="playerSpeed" name="playerSpeed" placeholder="Speed" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerPositioning" class="block mb-2">Positioning</label>
                            <input type="number" id="playerPositioning" name="playerPositioning" placeholder="Positioning" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="submit" id="submitBtn">Add Player</button>
                </div>
            </form>
        </section>
    </main>
    <script src="./script/script.js"></script>
</body>
</html>