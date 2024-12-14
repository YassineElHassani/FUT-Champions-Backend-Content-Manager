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
        <div class="sidebar-logo">
            <img src="./src/img/logo.png" alt="Dashboard Logo">
            <h2>FUT Team Builder</h2>
        </div>
        <nav class="sidebar-menu">
            <a href="#" onclick="showSection('home')" class="active"><i>📊</i> Dashboard</a>
            <a href="#" onclick="showSection('addPlayer')"><i>👥</i> Add Players</a>
            <!-- <a href="#" onclick="showSection('home')"><i>🏆</i> Teams</a>
            <a href="#" onclick="showSection('home')"><i>📋</i> Leagues</a> -->
            <a href="#" onclick="showSection('logout')"><i>↩️</i> Logout</a>
        </nav>
    </aside>

    <main class="main-content">
        <header class="dashboard-header">
            <h1>FUT Management Dashboard</h1>
            <div class="user-profile">
                <img src="./src/img/admin.jpg" alt="User Avatar">
                <div>
                    <strong>Full Name</strong>
                    <p>Admin</p>
                </div>
            </div>
        </header>

        <section class="dashboard-grid" id="home">
            <div class="dashboard-card">
                <div class="card-header">
                    <h3>Total Players</h3>
                    <p>👥</p>
                </div>
                <div class="card-value">254</div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <h3>Active Clubs</h3>
                    <p>🏆</p>
                </div>
                <div class="card-value">42</div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <h3>All Potions</h3>
                    <p>📋</p>
                </div>
                <div class="card-value">8</div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <h3>Recent Transfers</h3>
                    <p>🔄</p>
                </div>
                <div class="card-value">12</div>
            </div>
        </section>

        <section id="addPlayer">

        </section>

        <section class="" id="logout">

        </section>
    </main>
    <script>
        function showSection(sectionId) {
          document.querySelectorAll('.section').forEach(section => {
            section.classList.add('hidden');
          });
          document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
</body>
</html>