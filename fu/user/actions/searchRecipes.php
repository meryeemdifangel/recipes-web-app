

<?php 
require_once "../../controller.php";
$controller = new myController();
$data =$controller->getSearchRecipes();
$controller->displayRecipeIdeasPageResult($data);
?>
