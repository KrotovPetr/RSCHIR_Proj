<?php

function editUsersItemMethod()
{
    $id = $_GET["id"];
    $name = $_GET["login"];
    $description = $_GET["password"];
    $description= sha1($description);

    header('Content-Type: application/json');
    print_r(json_encode(updateUsersInCatalog($id, $name, $description), JSON_UNESCAPED_UNICODE));
}
