<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/dashboardStyle.css">
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
            <a href="editPlayers.php"><i>📋</i> Edit Players</a>
            <a href="login.php" class="active"><i>↩️</i> Logout</a>
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

        <section id="logout" class="logout">
            <div class="logoutContainer">
                <h1><center>Are you sure you want to logout?</center></h1>
                <div class="logoutBtns">
                    <button class="Y" onclick="confirmLogout()">Yes</button>
                    <button class="N" onclick="cancelLogout()">Cancel</button>
                </div>
            </div>
        </section>
    </main>
    <script>
        function confirmLogout() {
            window.location.href = 'login.php';
        }

        function cancelLogout() {
            window.location.href = 'dashboard.php';
        }
    </script>
</body>
</html>