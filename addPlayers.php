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
            <form id="playerForm" class="space-y-4" method="post">
                <h2 class="text-xl font-bold mb-4">Add Player</h2>

                <div>
                    <label for="playerPosition" class="block mb-2">Position</label>
                    <select id="playerPosition" class="w-full p-2 bg-gray-50 rounded" required name="playerPosition">
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
                      
                    <div>
                        <label for="playerName" class="block mb-2 mt-[10px]">Player Name</label>
                        <input type="text" id="playerName" name="playerName" value="" placeholder="Player Name" class="w-full p-2 bg-gray-50 rounded" required>
                    </div>
                </div>

                <div id="standardFields">
                    <div class="grid grid-cols-2 gap-4">

                        <div class="form-group">
                            <label for="playerNationality" class="block mb-2">Nationality</label>
                            <select id="playerNationality" name="playerNationality" value="" placeholder="Club" class="p-2 w-[100%] bg-gray-50 rounded" required>
                                <option value="">Select a Country</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Brazil.svg">Brazil</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg">Argentina</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/b/ba/Flag_of_Germany.svg">Germany</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg">Spain</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg">France</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/0/03/Flag_of_Italy.svg">Italy</option>
                                <option value="https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Morocco.svg">Morocco</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/14.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=fd61715cd36adf0e87e417376744e767">England</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/38.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=f9463fd3973965923de9e8945e9ca0fe">Portugal</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/47.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=42fcb74d34c4bb16d05691a577fce8b7">Switzerland</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/7.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=d637d192ddd27cedb47b9fe38b6ff092">Belgium</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/95.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=0b702fb25c991ab4f69369531d597a86">United States</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/10.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=e9e638ef1ccc508be6ac23d7accd7d51">Croatia</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/46.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=598da3c78c1c9d271fba1dd450958a42">Sweden</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/56.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=27a700cd51ff8951cdbafbcddae33711">Colombia</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/83.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=c79296acc36d91c1e27b0b470c3de354">Mexico</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/60.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=cce947ae4eba3db3eb30df2232bdc3aa">Uruguay</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/55.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=5dc0c902ead8f292527e616605cdcbdf">Chile</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/13.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=8cbde4f0113f7c7388cf72224126d00b">Denmark</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/nation/163.png?fm=png&amp;ixlib=java-2.1.0&amp;w=70&amp;s=bfa014f8ed2b28e2d96c3345021a153f">Japan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="playerClub" class="block mb-2">Club</label>
                            <select id="playerClub" name="playerClub" value="" placeholder="Club" class="p-2 w-[100%] bg-gray-50 rounded" required>
                                <option value="">Select a Club</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/241.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=2e69666cf40b727b95e8a7d9c6f826c0">FC Barcelona</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/11.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=d634f823d355069c2550a1af0508d0b6">Manchester United</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/243.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=bb98e3479ba0959fdb7031ce0834fc3f">Real Madrid</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/240.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=c11cce2f95472cd8029518f50f33b072">Atlético de Madrid</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/1.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=0f5f1b415788c03a743b0d898ccba3af">Arsenal</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/21.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=e3b8047ca7192b7dcb2ea63bd0d03ce8">Bayern Munich</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/45.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=f1f8808346246870756ad5d8228e986d">Juventus</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/5.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=a95904bd7ea09c4e68243f801a89bf88">Chelsea</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/73.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=0f38a396c70909e8d42f5c5df7106dfc">PSG</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/47.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=a9067499062a84a811320e43ab18a7ab">AC Milan</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/9.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=57ffc54f58dce3d534f1cc8447eb70c6">Liverpool</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/10.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=95cbb451617b845465701b79e8fbc3a7">Manchester City</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/112893.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=d485e05543c5221ff56faa5e1ab9c844">Inter Milan</option> 
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/17.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=af314b5587c3cc402cd40784e876a447">Southampton</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/22.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=610202ab57221514d872d7c05d922e1e">Borussia Dortmund</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/112172.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=c02e0780a50292d3f495e7feade1a040">RB Leipzig</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/34.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=56cd24df37579679f62b698ac3ae43a6">Schalke 04</option>
                                <option value="https://cdn3.futbin.com/content/fifa25/img/clubs/dark/52.png?fm=png&amp;ixlib=java-2.1.0&amp;verzion=2&amp;w=256&amp;s=2064ddd0b6eb32fdae1b1b4f4338abdc">AS Roma</option>
                            </select>
                        </div>

                        <div>
                            <label for="playerPhoto" class="block mb-2">Photo URL</label>
                            <input type="text" id="playerPhoto" name="playerPhoto" value="" placeholder="Photo URL" class="p-2 w-[100%] bg-gray-50 rounded" required/>
                        </div>

                        <div>
                            <label for="playerRating" class="block mb-2">Rating</label>
                            <input type="number" id="playerRating" name="playerRating" value="" placeholder="Rating" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                    </div>


                    <div id="standardPlayer" class="grid grid-cols-3 gap-2 mt-4">
                        <div>
                            <label for="playerPace" class="block mb-2">Pace</label>
                            <input type="number" id="playerPace" name="playerPace" value="" placeholder="Pace" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerShooting" class="block mb-2">Shooting</label>
                            <input type="number" id="playerShooting" name="playerShooting" value="" placeholder="Shooting" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerPassing" class="block mb-2">Passing</label>
                            <input type="number" id="playerPassing" name="playerPassing" value="" placeholder="Passing" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerDribbling" class="block mb-2">Dribbling</label>
                            <input type="number" id="playerDribbling" name="playerDribbling" value="" placeholder="Dribbling" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerDefending" class="block mb-2">Defending</label>
                            <input type="number" id="playerDefending" name="playerDefending" value="" placeholder="Defending" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                        <div>
                            <label for="playerPhysical" class="block mb-2">Physical</label>
                            <input type="number" id="playerPhysical" name="playerPhysical" value="" placeholder="Physical" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded" required>
                        </div>
                    </div>
                </div>

                <div id="gkFields" class="hidden">
                    <div class="grid grid-cols-3 gap-2 mt-4">
                        <div>
                            <label for="playerDiving" class="block mb-2">Diving</label>
                            <input type="number" id="playerDiving" name="playerDiving" value="" placeholder="Diving" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerHandling" class="block mb-2">Handling</label>
                            <input type="number" id="playerHandling" name="playerHandling" value="" placeholder="Handling" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerKicking" class="block mb-2">Kicking</label>
                            <input type="number" id="playerKicking" name="playerKicking" value="" placeholder="Kicking" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerReflexes" class="block mb-2">Reflexes</label>
                            <input type="number" id="playerReflexes" name="playerReflexes" value="" placeholder="Reflexes" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerSpeed" class="block mb-2">Speed</label>
                            <input type="number" id="playerSpeed" name="playerSpeed" value="" placeholder="Speed" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                        <div>
                            <label for="playerPositioning" class="block mb-2">Positioning</label>
                            <input type="number" id="playerPositioning" name="playerPositioning" value="" placeholder="Positioning" min="1" max="99" class="p-2 w-[100%] bg-gray-50 rounded">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="#dashboard" id="submitBtn"><p style="padding: 13px; margin-left: 22px;">Add Player</p></a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>