<?php
include './config/db_connection.php';

if (isset($_POST['submitBtn'])) {
                
    $clubName = isset($_POST['clubName']) ? trim($_POST['clubName']) : '';
    $clubLogo = isset($_POST['clubLogo']) ? trim($_POST['clubLogo']) : '';
        
    $errorMessage = "";
    $successMessage = "";
        
    if (empty($clubName) || empty($clubLogo)) {
        $errorMessage = "All the fields are required!";
    } else {
        $sql = "INSERT INTO club (clubName, clubLogo) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $clubName, $clubLogo); 
            
        if ($stmt->execute()) {
            $successMessage = "Club added successfully!";
        } else {
            $errorMessage =  "Error: " . $stmt->error . "";
        }
            
        $stmt->close();
    }
}

$connection->close();

session_start();
if (isset($_SESSION['redirected']) && $_SESSION['redirected'] === true) {
    $successMessage = "Club deleted successfully";
    unset($_SESSION['redirected']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Add Club 🛡️</title>
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
            <a href="addClub.php" class="active"><i>🛡️</i><b>Add Club</b></a>
            <a href="editPlayers.php"><i>📋</i><b>Edit Players</b></a>
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
        <section id="addClub" class="addPlayer">
            <form id="playerForm" class="space-y-4" method="POST">
                <h2 class="text-xl font-bold mb-4">Add Club</h2>
                
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
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                    }
                ?>

                <div class="grid grid-cols-2 gap-2 mt-4">
                        <div>
                            <label for="clubName" class="block mb-2">Club Name</label>
                            <input type="text" id="clubName" name="clubName" placeholder="Club Name" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="clubLogo" class="block mb-2">Club Logo</label>
                            <input type="text" id="clubLogo" name="clubLogo" placeholder="Club Logo URL" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button type="submit" id="submitBtn" name="submitBtn">Add</button>
                </div>
            </form>
        </section>

        <section id="Clubs">
            <div class="table-container">
                <table class="players-table">
                    <thead>
                        <tr>
                            <th>club ID</th>
                            <th>Club Name</th>
                            <th>Club Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include './config/db_connection.php';

                            $sql = "SELECT * FROM club";
                            $result = $connection->query($sql);

                            if(!$result) {
                                die("Invalid query: " . $connection->error);
                            }

                            while ($row = $result->fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td style='font-weight: bold;'>$row[clubID]</td>
                                        <td style='font-weight: bold;'>$row[clubName]</td>
                                        <td><center><img src='$row[clubLogo]' height='30px' width='50px'></center></td>
                                        <td>
                                            <center><div class='flex justify-center gap-3'>
                                                <a id='edit' href='editingClub.php?clubID=$row[clubID]' class='edit'>✏️</a>
                                                <a id='delete' href='deleteClub.php?clubID=$row[clubID]' class='delete'>❌</a>
                                            </div></center>
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