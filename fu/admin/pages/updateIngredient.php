<?php 
require_once "../../controller.php";
$cnt = new myController();
$cnt->adminUpdateIngredientPage($_GET["updateIngredient"]);
?>