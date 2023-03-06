<?php
   require_once "../../controller.php";
   $controller = new myController();

//echo $_GET['cat'];

   $controller->displayCategoryPage($_GET['cat']);

      ?>