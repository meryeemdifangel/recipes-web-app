<?php 
require_once "../../controller.php";
$controller = new myController();
$controller->likeRecipe($_GET["likeId"]);

?>