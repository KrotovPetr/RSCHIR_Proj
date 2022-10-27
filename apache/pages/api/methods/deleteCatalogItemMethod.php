<?php


function deleteCatalogItemMethod()
{
    $id = $_GET["id"];

    header('Content-Type: application/json');
    print_r(json_encode(deleteCatalogItem($id), JSON_UNESCAPED_UNICODE));
}
