

<?php 
require_once "../../controller.php";
require_once "../../view.php";
$view = new view();
$controller = new myController();
//echo $_POST['request'];
$table= $controller->getRecettesFeteSpecific($_POST['request']);

foreach ($table as $row) {
    $view->displayOneRecipeProfile($row,"fete");
  }
?>