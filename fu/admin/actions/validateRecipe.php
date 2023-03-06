

<?php 
require_once "../../controller.php";
$cnt = new myController();
$cnt->validateRecipe($_GET["validateRecipe"]);
?>

