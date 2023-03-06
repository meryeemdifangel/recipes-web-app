

<?php 
require_once "../../controller.php";
$controller = new myController();
if(!empty($_GET['id'])) echo $_GET['id'];
$controller->displayNewsDetailsPage($_GET['id']);
?>