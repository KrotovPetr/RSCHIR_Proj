<?php
include '../login.php';
require '../../vendor/autoload.php';
use Nelmio\Alice\Loader\NativeLoader;


class Dump {
    public $squirrels;
    public $fats;
    public $carbohydrates;
}


$loader = new Nelmio\Alice\Loader\NativeLoader();
$fixtures = $loader->loadFile('./fixtures.yml');
