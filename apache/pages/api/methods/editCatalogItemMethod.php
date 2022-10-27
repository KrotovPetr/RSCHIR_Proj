<?php


function editCatalogItemMethod()
{
    $id = $_GET["id"];
    $name = $_GET["name"];
    $description = $_GET["desc"];
    $price = $_GET["price"];


    header('Content-Type: application/json');
    print_r(json_encode(updateItemInCatalog($id, $name, $price, $description), JSON_UNESCAPED_UNICODE));
}
