

<?php 
require_once "../../controller.php";
require_once "../../view.php";
$view = new view();
$controller = new myController();
echo $_POST['prenomAdminFilter'];
if($_POST['prenomAdminFilter']=="asc"){
    $table= $controller->getUsersOrderAsc();

}
else{
    $table= $controller->getUsersOrderDesc();
}


foreach ($table as $row) {
    echo '
    <tr>
                                    
    <td>  
        <div class="d-flex align-items-center justify-content-start">
        <img src="../../pictures/'.$row["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px; margin-right:5px;"
        alt="Avatar" />
        <p>'.$row["nomUtilisateur"].' '.$row["prenomUtilisateur"].'</p>
        </div>
    </td>
    <td>'.$row["emailUtilisateur"].'</td>
    <td>'.$row["sexUtilisateur"].'</td>
    <td>'.$state[$row["statusUtilisateur"]].'</td>
    <td class="table-action">
        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
        <a href="../actions/deleteRecipe.php/?deleteRecipe='.$row["idUtilisateur"].'" class="action-icon"> <i class="mdi mdi-delete"></i></a>
    </td>
</tr>
    ';
  }
?>