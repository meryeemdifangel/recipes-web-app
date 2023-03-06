

<?php 
require_once "../../controller.php";
require_once "../../view.php";
$view = new view();
$controller = new myController();
if(!isset($_POST['filterNotation']) || $_POST['filterNotation']=="0"){			
    $_POST['filterNotation']="";
}
if(!isset($_POST['filterSaison']) || $_POST['filterSaison']==""){			
    $_POST['filterSaison']="";
}
else {
    //echo $_POST['filterSaison'];
}

if(!isset($_POST['cookingTimeFilter']) || $_POST['cookingTimeFilter']=="0"){			
    $_POST['cookingTimeFilter']="";
}

if(!isset($_POST['preparationTimeFilter']) || $_POST['preparationTimeFilter']=="0"){			
    $_POST['preparationTimeFilter']="";
}

if(!isset($_POST['restTimeFilter']) || $_POST['restTimeFilter']=="0"){			
    $_POST['restTimeFilter']="";
}

if(!isset($_POST['totalTimeFilter']) || $_POST['totalTimeFilter']=="0"){			
    $_POST['totalTimeFilter']="";
}

if(!isset($_POST['caloriesFilter']) || $_POST['caloriesFilter']=="0"){			
    $_POST['caloriesFilter']="";
}

if(!isset($_POST['order']) || $_POST['order']==""){
    $_POST['order'] = "";
}
//echo $_POST['filterSaison'];
//echo $_POST['filterNotation'];
//echo $_POST['preparationTimeFilter'];

$table= $controller->filter($_POST['cat'],$_POST['filterSaison'],$_POST['cookingTimeFilter'],$_POST['preparationTimeFilter'],$_POST['totalTimeFilter'],$_POST['restTimeFilter'],$_POST['caloriesFilter'],$_POST['filterNotation'],$_POST['order']);

foreach ($table as $row) {
    $view->displayOneRecipeCategory($row);
 }
 
?>