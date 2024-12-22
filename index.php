<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <nav class="nav">
            <a href="./index.php" style="display: flex; align-items: center;"><img src="./src/img/logo.png" alt="Logo"><h2>FUT Team Builder</h2></a>
            <button type="button"><a href="./login.php" style="text-decoration: none; margin-inline: auto;">Dashboard</a></button>
        </nav>
    </header>
    <main class="homeContainer">
        <div class="stadium">
            <div id="firstFormation" class="flex flex-col items-center" style="margin-bottom: 20px;">
                <div id="attackPlayer">
                    <div class="playerSlot LF"></div>
                    <div class="playerSlot ST"></div>
                    <div class="playerSlot RF"></div>
                </div>
                <div id="midPlayer">
                    <div class="playerSlot LCM"></div>
                    <div class="playerSlot CAM"></div>
                    <div class="playerSlot RCM"></div>
                </div>
                <div id="defencePlayer">
                    <div style="display: flex; justify-content: space-around; width: 100%;">
                        <div class="playerSlot LB"></div>
                        <div class="playerSlot LCB"></div>
                    </div>
                    <div style="display: flex; justify-content: space-around; width: 100%;">
                        <div class="playerSlot RCB"></div>
                        <div class="playerSlot RB"></div>
                    </div>
                </div>
                <div id="gkPlayer">
                    <div class="playerSlot GK"></div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-center py-4 bg-gray-900 text-gray-500 h-[200px]">
        <p class="pt-[80px]">© 2024 FUT Champions Squad Builder. All Rights Reserved.</p>
    </footer>
    <script src=""></script>
</body>
</html>