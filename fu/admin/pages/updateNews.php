<?php 
require_once "../../controller.php";
$cnt = new myController();
$cnt->updateNewsPage($_GET["updateNews"]);
?>