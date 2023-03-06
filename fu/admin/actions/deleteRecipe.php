<?php 
require_once "../../controller.php";
$cnt = new myController();
echo $_GET["deleteRecipe"];
$cnt->deleteRecipe($_GET["deleteRecipe"]);
?>