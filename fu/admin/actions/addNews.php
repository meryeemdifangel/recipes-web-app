<?php 
require_once "../../controller.php";
$cnt = new myController();


$cnt->addNews($_POST["titreNews"],$_POST["descriptionNews"]);
?>