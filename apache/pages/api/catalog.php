<?php

require "services/dbWorker.php";
include "./methods/getCatalogMethod.php";
include "./methods/addCatalogItemMethod.php";
include "./methods/deleteCatalogItemMethod.php";
include "./methods/editCatalogItemMethod.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        getCatalogMethod();
        break;
    case "POST":
        addCatalogItemMethod();
        break;
    case 'DELETE':
        deleteCatalogItemMethod();
        break;
    case "PUT":
        editCatalogItemMethod();
        break;
    default:
        header("HTTP/1.0 405 Service Unavailable");
}


