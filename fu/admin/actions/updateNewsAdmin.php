<?php 
require_once "../../controller.php";
$cnt = new myController();


//echo $_POST["descriptionNews"];
//echo $_FILES["imageNews"];
//echo $_POST["videoNews"];
$cnt->updateNews($_GET['updateNews']);
?>