<?php


function addUserMethod()
{
    $name = $_GET["login"];
    $pass = $_GET["password"];

    $pass = sha1($pass);

    header('Content-Type: application/json');
    print_r(json_encode(addUser($name, $pass), JSON_UNESCAPED_UNICODE));
}
