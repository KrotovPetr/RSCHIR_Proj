<?php


function deleteToolsItemMethod()
{
    $id = $_GET["id"];
    header('Content-Type: application/json');
    print_r(json_encode(deleteToolsItem($id), JSON_UNESCAPED_UNICODE));
}
