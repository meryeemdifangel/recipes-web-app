

<?php 
require_once "../../controller.php";
require_once "../../view.php";
$view = new view();
$controller = new myController();
$table= $controller->getRecettesNutritionSpecific($_POST['request']);

foreach ($table as $row) {
    $view->displayOneIngredient($row);
  }
?>