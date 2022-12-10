<?php


function getUsersMethod()
{
    $offset = (array_key_exists("offset", $_GET)) ? $_GET["offset"] : 0;
    $limit = (array_key_exists("limit", $_GET)) ? $_GET["limit"] : 500;

    $data = getUsers($offset, $limit);

    header('Content-Type: application/json');
    print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
}
