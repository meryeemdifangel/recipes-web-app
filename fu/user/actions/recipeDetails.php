

<?php 
require_once "../../controller.php";
$controller = new myController();
if(!empty($_GET['id'])) echo "adel " .$_GET['id'];
$controller->displayRecipeDetailsPage($_GET['id']);
?>