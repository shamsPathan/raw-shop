<?php

include_once '../app/dbconfig.php';

if ($env == 'nur') {
    define("PATH", 'https://' . $_SERVER['HTTP_HOST'] . "/");
} else {
    define("PATH", 'http://' . $_SERVER['HTTP_HOST'] . "/");
}

include_once('../app/class/Product.php');
//require_once '../vendor/autoload.php';
//require_once  '../app/database.php';
require_once '../app/core/controller.php';
require_once '../app/core/app.php';
include_once("../app/helper/helper.php");

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule;

$instance = ConnectDb::getInstance();

$capsule->addConnection([

   "driver"   => "mysql",

   "host"     => $instance->host,

   "database" => $instance->name,

   "username" => $instance->user,

   "password" => $instance->pass

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();


function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}

define( 'SITE_URL', siteURL() );
