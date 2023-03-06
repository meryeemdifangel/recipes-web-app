<?php 
require_once "../../controller.php";
$cnt = new myController();


echo "lalalallalalalalal";
$cnt->noteRecipe($_POST['idd'],$_POST['note']);
?>