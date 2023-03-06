<?php 
require_once "../../controller.php";
$cnt = new myController();
if(!empty($_GET["blockUser"])){
    $cnt->blockUser($_GET["blockUser"]);
}
if(!empty($_GET["unblockUser"])){
    $cnt->unblockUser($_GET["unblockUser"]);
}

?>
