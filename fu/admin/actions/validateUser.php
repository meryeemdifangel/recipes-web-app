<?php 
require_once "../../controller.php";
$cnt = new myController();
$cnt->validateUser($_GET["validateUser"]);
?>
