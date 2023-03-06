

<?php 
require_once "../../controller.php";
require_once "../../view.php";
$view = new view();
$controller = new myController();
$cats = array("", "entrees", 'plats', 'boissons', 'desserts');
$table= $controller->getRecettesFeteSpecific($_POST['fetesAdmin']);
foreach ($table as $row) {
    echo '
    <tr>
    <td>
    <img src="../../pictures/recipes/'.$row["linkImage"].'" class="rounded-circle mr-3" style="width: 60px; height:60px; margin-right:5px;"
    alt="Avatar" />
    </td>

          <td>'.$row["titreRecette"].'</td>
          <td>'.$cats[$row["idCategorie"]].'</td>
          <td>  
              <div class="d-flex align-items-center justify-content-start">
              <img src="../../pictures/profile/'.$row["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px; margin-right:5px;"
              alt="Avatar" />
              <p>'.$row["nomUtilisateur"].' '.$row["prenomUtilisateur"].'</p>
              </div>
          </td>
          <td><i class="mdi mdi-circle text-success"></i> Accepted</td>
          <td style="justify-content:end;" class="table-action">';
          
          if($row["valideRecette"]==0){
      echo '<a href="../actions/validateRecipe.php?validateRecipe=' . $row["idRecette"] . '"  class="action-icon"  ><i class="fas fa-check-square"></i> </a> ';
          }
              echo '<a href="../pages/updateRecipe.php?updateRecipe='.$row["idRecette"].'" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
              <a href="../actions/deleteRecipe.php/?deleteRecipe='.$row["idRecette"].'" class="action-icon"> <i class="mdi mdi-delete"></i></a>
          </td>
      </tr>
    ';
  }
?>