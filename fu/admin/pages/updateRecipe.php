<?php 
require_once "../../controller.php";
$cnt = new myController();
$cnt->updateRecipePage($_GET["updateRecipe"]);
?>