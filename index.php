<?php
require_once 'model/database.php';
$controller = 'home';

if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    call_user_func(array( $controller, $accion ));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>iShoppers</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="./libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <script src="./libs/bootstrap/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="./libs/bootstrap/js/popper.min.js" type="text/javascript"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

</body>

</html>
