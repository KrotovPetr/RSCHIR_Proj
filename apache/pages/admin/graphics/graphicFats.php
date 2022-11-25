<?php
include '../../api/services/login.php';
include './getFixtures.php';
include './drawNormGraphic.php';

$norm = 15;

$points = [0, 0]; // 0 - <=$norm; 1 - >$norm

foreach ($fixtures->getObjects() as $fixture) {
    $points[$fixture->fats > $norm ? 1 : 0]++;
}

drawNormGraphic($norm, $points, "Fats", "Fats norm", 0, max($points) + 1);
