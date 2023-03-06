<?php 
require_once "../../controller.php";
$cnt = new myController();
echo $_GET["deleteNews"];
$cnt->deleteNews($_GET["deleteNews"]);
?>