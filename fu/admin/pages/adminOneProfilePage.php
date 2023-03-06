

<?php 
require_once "../../controller.php";
$controller = new myController();
$user = $controller->getUser($_GET["oneProfile"]);
foreach($user as $u){
    $profile = $u;
}
$controller->adminOneProfilePage($u);
?>