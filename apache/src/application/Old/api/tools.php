<?php

require "services/dbWorker.php";
include "./methods/getToolsMethod.php";
include "./methods/addToolsItemMethod.php";
include "./methods/deleteToolsItemMethod.php";
include "./methods/editToolsItemMethod.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        getToolsMethod();
        break;
    case "POST":
        addToolsItemMethod();
        break;
    case 'DELETE':
        deleteToolsItemMethod();
        break;
    case "PUT":
        editToolsItemMethod();
        break;
    default:
        header("Can't help you");
}


