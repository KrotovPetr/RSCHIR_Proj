<?php


function addToolsItemMethod()
{
    $name = $_GET["name"];
    $description = $_GET["desc"];
    $price = $_GET["price"];

    header('Content-Type: application/json');
    print_r(json_encode(addItemToTools($name, $price, $description), JSON_UNESCAPED_UNICODE));
}
