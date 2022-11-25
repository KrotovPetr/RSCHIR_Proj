<?php
include './getFixtures.php';
include './drawNormGraphic.php';

$norm = 50;

$points = [0, 0]; // 0 - <=$norm; 1 - >$norm

foreach ($fixtures->getObjects() as $fixture) {
    $points[$fixture->squirrels > $norm ? 1 : 0]++;
}

drawNormGraphic($norm, $points, "Squirrels", "Squirrels norm", 0, max($points) + 1);
