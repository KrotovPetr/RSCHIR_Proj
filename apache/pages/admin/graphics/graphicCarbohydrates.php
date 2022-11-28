<?php
include '../login.php';
include './getFixtures.php';

require '../../../vendor/autoload.php';

// c-pchart
use CpChart\Chart\Pie;
use CpChart\Data;
use CpChart\Image;

include './drawImage.php';

$points = [];
$labels = [];

foreach ($fixtures->getObjects() as $fixture) {
    $carbohydrates = $fixture->carbohydrates;
    $index = array_search($carbohydrates, $labels);

    if ($index !== false) {
        $points[$index]++;
    } else {
        array_push($points, 1);
        array_push($labels, $carbohydrates);
    }
}

$serie_abcissa = "serie_abcissa";
$serie_carbohydrates = "serie_carbohydrates";

// Create and populate data
$data = new Data();
$data->addPoints($points, $serie_carbohydrates);

// Define the absissa serie
$data->addPoints($labels, $serie_abcissa);
$data->setAbscissa($serie_abcissa);

// Create the image
$image = new Image(400, 230, $data);

// Add a border to the picture
$image->drawRectangle(0, 0, 399, 229, ["R" => 0, "G" => 0, "B" => 0]);

// Write the picture title
$image->setFontProperties(["FontName" => "Silkscreen.ttf", "FontSize" => 14]);
$image->drawText(200, 13, "Carbohydrates", ["R" => 0, "G" => 0, "B" => 0, "Align" => TEXT_ALIGN_TOPMIDDLE]);

// Set the default font properties
$image->setFontProperties(["FontName" => "Forgotte.ttf", "FontSize" => 10, "R" => 80, "G" => 80, "B" => 80]);

// Create and draw the chart
$pieChart = new Pie($image, $data);
$pieChart->draw2DPie(200, 125, ["DrawLabels" => true, "Border" => true]);

drawImage($image);
