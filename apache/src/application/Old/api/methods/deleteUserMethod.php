<?php

function deleteUserMethod()
{
    $id = $_GET["id"];

    header('Content-Type: application/json');
    print_r(json_encode(deleteUser($id), JSON_UNESCAPED_UNICODE));
}