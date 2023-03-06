<?php 
require_once "../../controller.php";
$cnt = new myController();

if(isset($_GET["deleteRecipeDiapo"])){
    $cnt->deleteRecipeDiapo($_GET["deleteRecipeDiapo"]);

}

if(isset($_GET["deleteNewsDiapo"])){
$cnt->deleteNewsDiapo($_GET["deleteNewsDiapo"]);
}
?>