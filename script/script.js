const playerPosition = document.getElementById('playerPosition');
const standardPlayer = document.getElementById('standardPlayer');
const gkFields = document.getElementById('gkFields');

playerPosition.addEventListener('change', (e) => {
    const isGoalkeeper = e.target.value === "1";
    standardPlayer.classList.toggle('hidden', isGoalkeeper);
    gkFields.classList.toggle('hidden', !isGoalkeeper);
});