<?php

require "services/dbWorker.php";
include "./methods/getUsersMethod.php";
include "./methods/addUserMethod.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        getUsersMethod();
        break;
    case "POST":
        addUserMethod();
        break;
    case 'DELETE':
        deleteUserMethod();
        break;
    default:
        header("HTTP/1.0 405 Service Unavailable");
}


