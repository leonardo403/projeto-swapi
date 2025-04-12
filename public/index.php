<?php

require_once '../vendor/autoload.php';

use Leonardo\Swapi\SwapiService;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $distance = intval($_POST['distance'] ?? 0);
    $results = [];

    if ($distance > 0) {
        $starships = SwapiService::fetchAllStarships();
        foreach ($starships as $ship) {
            $stops = SwapiService::calculateStops($distance, $ship['MGLT'], $ship['consumables']);
            $results[$ship['name']] = $stops;
        }
    }
}

?>

<form method="POST">
    <label>Distância (em MGLT):</label>
    <input type="number" name="distance" required>
    <button type="submit">Calcular</button>
</form>

<?php if (!empty($results)): ?>
    <h2>Resultado:</h2>
    <ul>
        <?php foreach ($results as $name => $stops): ?>
            <li><?= htmlspecialchars($name) ?>: <?= $stops ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
