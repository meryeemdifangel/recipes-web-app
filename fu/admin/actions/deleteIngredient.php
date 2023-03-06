


<?php 
require_once "../../controller.php";
$cnt = new myController();
echo $_GET["deleteIngredient"];
$cnt->deleteIngredient($_GET["deleteIngredient"]);
?>