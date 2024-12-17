<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/dashboardStyle.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Position</th>
                        <th>Name</th>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody style="background-color: rgb(102, 121, 228); color: #fff;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="flex justify-around">
                                <a href="editing.php" class="btn btn-sm btn-primary">Edit</a>
                                <a href="delete.php" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>