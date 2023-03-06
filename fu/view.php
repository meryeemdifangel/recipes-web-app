<?php
require_once("controller.php");
class view
{

  public function myHead()
  {
    ?>
     <!doctype html>
<html lang="en">
  <head>
    <title>Carousel 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
 
  <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/main.js"></script>
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/home.css">
    

  </head>
          <?php
  }

  public function adminHead()
  {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

        <!-- third party css -->
        <link href="../assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">

        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="../assets/js/vendor/apexcharts.min.js"></script>
        <script src="../assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->
        <script src="../../../assets/js/jquery.min.js"></script>

        <!-- demo app -->

        <script src="https://code.jquery.com/jquery-3.1.1.min.js">


       <script src="../assets/js/pages/demo.dashboard.js"></script> 
        <script src="../filters.js"></script>
        <link href="../assets/css/admin.css" rel="stylesheet" type="text/css">



    </head>
          <?php
  }

  
  public function adminUsersPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div style="display:flex;align-items:center;justify-content:center;" class="page-title-right">  
                                                              
                                        <form class="d-flex">                 
                                        <select 
                                        style="background-color:transparent;
                                        margin-right:20px;
                                        padding:3px 10px;
                                        "
                                         id="prenomAdminFilter">
    <option value="">Name</option>
    <option value="asc">Asc</option>
    <option value="desc">Desc</option>
</select>
                                      
                                        <select 
                                        style="background-color:transparent;
                                        margin-right:20px;
                                        padding:3px 10px;
                                        "
                                         id="sexeAdmin">
    <option value="">Sex</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
</select>

<button id="filterUserAdmin" >Search</button>

                               
                                        </form>
                                        
                                    </div>
                                    <h4 class="page-title">Users</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <table class="table table-centered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Sexe</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="userAdmin" >
                            <?php
                            $state = array("pending", "accepted","blocked");
                              $controller=new myController();
                              $table=$controller->getAllUsers();
                            foreach ($table as $row) {
                              echo '
                              <tr>
                                    
                                    <td>  
                                        <div class="d-flex align-items-center justify-content-start">
                                        <img src="../../pictures/profile/'.$row["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px; margin-right:5px;"
                                        alt="Avatar" />
                                        <p>'.$row["nomUtilisateur"].' '.$row["prenomUtilisateur"].'</p>
                                        </div>
                                    </td>
                                    <td>'.$row["emailUtilisateur"].'</td>
                                    <td>'.$row["sexUtilisateur"].'</td>
                                    <td>'.$state[$row["statusUtilisateur"]].'</td>
                                    <td class="table-action">';
                                    if($row["statusUtilisateur"]==0){
                                echo '<a href="../actions/validateUser.php?validateUser='.$row["idUtilisateur"].'" class="action-icon"><i class="fas fa-check-square"></i></a>';
                                    }
                                    if($row["statusUtilisateur"]==2)   
                                    {echo'<a style="font-size:15px;" href="../actions/blockUser.php/?unblockUser='.$row["idUtilisateur"].'" class="action-icon">unblock</a>';}
                                    if($row["statusUtilisateur"]==1) {
                                      {echo'<a style="font-size:15px;" href="../actions/blockUser.php/?blockUser='.$row["idUtilisateur"].'" class="action-icon">block</a>';}

                                    }
                                        echo'<a style="font-size:15px;" href="./adminOneProfilePage.php?oneProfile='.$row["idUtilisateur"].'" class="action-icon">Details</a>
                                    </td>
                                </tr>
                              ';
                            }
                            ?> 
                            </tbody>
                        </table>
                </div>
                <!-- content -->
            </div>
        </div>
<script >
$("#filterUserAdmin").click(function(e) {
  e.preventDefault();
                var value = $("#sexeAdmin").children("option:selected").val();
                var value1 = $("#prenomAdminFilter").children("option:selected").val();
        console.log(value1);
        console.log(value);
                    $.ajax({
                        type: "POST",
                        url: "../actions/filterUserAdmin.php",
                        data: {sexeAdmin:value ,prenomAdminFilter:value1},
                        success: function(data) {
                          $('.userAdmin').html(data); 
                        }
                      });
                  });
</script>
    </body>
</html>
      <?php
  }

  public function adminRecipesPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div style="display:flex;align-items:center;justify-content:center;" class="page-title-right">  
                                    <a href="createRecipeAdmin.php" ><button style="padding:3px 8px; border:1px solid lightgray; background-color:transparent; margin-right:10px; " type="submit"> Add recipe</button></a>                            
                                        <form class="d-flex">                 
                                        <select 
                                        style="background-color:transparent;
                                        margin-right:20px;
                                        padding:3px 10px;
                                        "
                                         id="saisonsAdmin">
    <option value="">Season</option>
    <option value="summer">Summer</option>
    <option value="winter">Winter</option>
    <option value="spring">Spring</option>
    <option value="autumn">Autumn</option>
</select>
<select style="padding:3px 10px;" name="fetesAdmin" id="fetesAdmin">
    <option value="">Fetes</option>
    <option value="fitr">Aid el fitr</option>
    <option value="adha">Aid el adha</option>
    <option value="mawlid">Al mawlid nabawi</option>
    <option value="yennayer">Yennayer</option>
</select>                                
                                        </form>
                                        
                                    </div>
                                    <h4 class="page-title">Recipes</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <table class="table table-centered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Recette</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Writer</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="recetteAdmin" >
                            <?php
                            $cats = array("", "entrees", 'plats', 'boissons', 'desserts');
                              $controller=new myController();
                              $table=$controller->getAllRecipes();
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
                                    </td>';
                                    if($row["valideRecette"]==1){
                                echo '<td><i class="mdi mdi-circle text-success"></i> Accepted</td>';

                                    }
                                    if($row["valideRecette"]==0){
                                      echo '<td><i class="mdi mdi-circle text-failure"></i> Pending</td>';
      
                                          }
                                    echo '<td style="justify-content:end;" class="table-action">';
                                    
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
                            </tbody>
                        </table>
                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }

  public function adminNewsPageMain()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div style="display:flex;align-items:center;justify-content:center;" class="page-title-right">  
                                    <a href="newsPage.php" ><button style="padding:3px 8px; border:1px solid lightgray; background-color:transparent; margin-right:10px; " type="submit"> Add news</button></a>                            
                            
                                    </div>
                                    <h4 class="page-title">News</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <table class="table table-centered mb-0">
                            <thead class="table-dark">
                                <tr>
                                <th>News</th>
                                    <th>Title</th>
                                    <th>Description</th>  
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="recetteAdmin" >
                            <?php
                              $controller=new myController();
                              $table=$controller->getAllNews();
                            foreach ($table as $row) {
                              echo '
                              <tr>
                              <td>
                            
                              <img src="../../pictures/news/'.$row["linkImage"].'" class="rounded-circle mr-3" style="width: 70px; height:70px; margin-right:5px;"
                              alt="Avatar" />
                              </td>
                                    <td>'.$row["titreNews"].'</td>
                                    <td>'.$row["descriptionNews"].'</td>
                                      <td style="justify-content:end;" class="table-action">';
                                        echo '<a href="../pages/updateNews.php?updateNews='.$row["idNews"].'" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="../actions/deleteNews.php/?deleteNews='.$row["idNews"].'" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                              ';
                            }
                            ?> 
                            </tbody>
                        </table>
                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }


  public function adminOneProfilePage($user)
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                 
                                    <h4 class="page-title">Profile</h4>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                            
                </div>
                <!-- content -->
                <div style="margin:auto; height:400px;width:700px;display:flex; align-items: center;justify-content: center; border:1px solid lightgray;">
                <?php
                echo'<img src="../../pictures/profile/'.$user["imageUtilisateur"].'" class="rounded-circle mr-3" style="margin-right:20px ;width: 150px; height: 150px;"
    alt="Avatar" />
    
    <div style="display:flex; flex-direction:column; align-items: center;" >
    <h4>'.$user["nomUtilisateur"].' '.$user["prenomUtilisateur"].'</h4>
    <h4>'.$user["emailUtilisateur"].'</h4>
    <h4>'.$user["bdUtilisateur"].'</h4>
    ';
    ?>

    </div>
                </div>
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }

  public function adminDiapoPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div style="display:flex;align-items:center;justify-content:center;" class="page-title-right">  
                                    <a href="diaporamaPage.php" ><button style="padding:3px 8px; border:1px solid lightgray; background-color:transparent; margin-right:10px; " type="submit">Add diaporama</button></a>                            
                            
                                    </div>
                                    <h4 class="page-title">Diaporama</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <table class="table table-centered mb-0">
                            <thead class="table-dark">
                                <tr>
                                <th>Diapo</th>
                                    <th>Recette</th>
                                    <th>Recipe / News</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="recetteAdmin" >
                            <?php
                              $controller=new myController();
                              $table=$controller->getDiaposRecette();
                            foreach ($table as $row) {
                              echo '
                              <tr>
                              <td>
                            
                              <img src="../../pictures/diapos/'.$row["imageDiapo"].'" class="rounded-circle mr-3" style="width: 100px; height:100px; margin-right:5px;"
                              alt="Avatar" />
                              </td>
                                    <td>'.$row["titreRecette"].'</td>
                                    <td>Recipe</td>
                                      <td style="justify-content:end;" class="table-action">';
                                      
                                        echo '
      
                                        <a href="../actions/deleteDiapo.php/?deleteRecipeDiapo='.$row["idDiapo"].'" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                              ';
                            }
                            $table1=$controller->getDiaposNews();
                            foreach ($table1 as $row1) {
                              echo '
                              <tr>
                              <td>
                            
                              <img src="../../pictures/diapos/'.$row1["imageDiapo"].'" class="rounded-circle mr-3" style="width: 100px; height:100px; margin-right:5px;"
                              alt="Avatar" />
                              </td>
                                    <td>'.$row1["titreNews"].'</td>
                                    <td>News</td>
                                      <td style="justify-content:end;" class="table-action">';
                                        echo '
                                        <a href="../actions/deleteDiapo.php/?deleteNewsDiapo='.$row1["idDiapo"].'" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                              ';
                            }

                            ?> 
                            </tbody>
                        </table>
                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }


  public function displayUpdateRecipe($id)
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Recipe</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php
$controller=new myController();
$table=$controller->getAdminRecipe($id);

echo '<form method="POST" action="../actions/updateRecipeAdmin.php?updateRecipe='.$id.'"  enctype="multipart/form-data"   > 
                        


                       <select name="categorieRecette[]" class="form-select mb-3">';
                        $cats = ["", "entrees","plats","boissons","desserts"];
                        foreach ($table as $row) {
                          echo'<option selected value="'.$row["idCategorie"].'" >'.$cats[$row["idCategorie"]].'</option>';
                        }
    echo '
    <option value="1">entrees</option>
    <option value="2">plats</option>
    <option value="3">boissons</option>
    <option value="4">desserts</option>
</select>   
<div class="mb-3">
    <label for="simpleinput" class="form-label">News title</label> 
';
 
foreach ($table as $row) {
          echo '<input value="'.$row["titreRecette"].'" name="titreRecetteAdmin" type="text" id="simpleinput" class="form-control">';
}
        echo '   
        </div>
        <div class="mb-3">
        <label for="example-textarea" class="form-label">Add news description</label>';
        foreach ($table as $row) {
          echo '<textarea  name="descriptionRecetteAdmin" class="form-control" id="example-textarea" rows="5">
          '.$row["descriptionRecette"].'
          </textarea>          ';
}

echo '
                   
</div>

<select name="saisonRecette[]" class="form-select mb-3">';
foreach ($table as $row) {
  echo'<option selected value="'.$row["saison"].'" >'.$row["saison"].'</option>';
}
echo '
    <option value="summer">Summer</option>
    <option value="winter">Winter</option>
    <option value="spring">Spring</option>
    <option value="autumn">Autumn</option>
</select> 

<select name="healthy[]" class="form-select mb-3">';
        $healthy = ["No", "yes"];
foreach ($table as $row) {
  echo'<option selected value="'.$row["healthyRecette"].'" >'.$healthy[$row["healthyRecette"]].'</option>';
}
 echo'
    <option value="1">Yes</option>
    <option value="0">No</option>
</select> 

<select name="news[]" class="form-select mb-3">';
$healthy = ["No", "yes"];
foreach ($table as $row) {
  echo'<option selected value="'.$row["newsRecette"].'" >'.$healthy[$row["newsRecette"]].'</option>';
}
 echo '
    <option value="1">Yes</option>
    <option value="0" >No</option>
</select>

<select name="fetes[]" class="form-select mb-3">';

foreach ($table as $row) {
  echo'<option selected value="'.$row["feteRecette"].'" >'.$row["feteRecette"].'</option>';
}

echo '<option value="yennayer">yennayer</option>
    <option value="mawlid">mawlid nabawi</option>
    <option value="adha">aid el adha</option>
    <option value="fitr">aid el fitr</option>
</select>

<label>Validate recipe</label>
<select name="valide[]" class="form-select mb-3">';
$healthy = ["No", "yes"];
foreach ($table as $row) {
  echo'<option selected value="'.$row["valideRecette"].'" >'.$healthy[$row["valideRecette"]].'</option>';
}
 echo '
    <option value="1">Yes</option>
    <option value="0" >No</option>
</select>

';

?>




<div class="col-auto">

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        </form>

                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }


  public function displayAdminDiaporamaPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manage diaporama</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
 
                        <form  method="POST" action="../actions/addDiapo.php"  enctype="multipart/form-data"   > 
                        <select id="diapo" name="diapo[]" class="form-select mb-3">
    <option >Recipe / News</option>
    <option value="1">recipe</option>
    <option value="0">news</option>
</select> 
<div id="recipeDiapoForm" >
<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add photos</label>
    <input  name="myImage1" type="file" id="myImage1" class="form-control">
</div>


<div class="mb-3">
<?php
       $controller=new myController();
       $table=$controller->getAllRecipes();
        echo
          '
  <select  id="selectRecipe" name="recipes[]" class="form-select">
    <option selected>Select Recipe</option>';
     foreach ($table as $row) {
echo 
    '<option value="'.$row["idRecette"].'">'.$row["titreRecette"].'</option>';}
    ?>
</select>
</div>
<button id="somebutton" type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        
        </div>

        <div style="display:none;"  id="newsDiapoForm"   > 

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add photos</label>
    <input  name="myImage2" type="file" id="myImage2" class="form-control">
</div>
<div class="mb-3">
<?php
       $controller=new myController();
       $table=$controller->getAllNews();
        echo
          '
  <select id="selectRecipe" name="news[]" class="form-select">
    <option selected>Select News</option>';
     foreach ($table as $row) {
echo 
    '<option value="'.$row["idNews"].'">'.$row["titreNews"].'</option>';}
    ?>
</select>
</div>
<button id="somebutton" type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        </div>
        </form>
 

<div class="col-auto">
<script>
$('#diapo').change(function() {
  selectedValue=$('#diapo').find(":selected").val()
  if(selectedValue==1) {
    console.log("recipes")
    $("#recipeDiapoForm").show();
    $("#newsDiapoForm").hide();
  } 
  else
  {
    console.log("news")
    $("#newsDiapoForm").show();
    $("#recipeDiapoForm").hide();
  }
})

</script>
        

                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }



  public function adminAddIngredientPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Recipe</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->       
                        <form method="POST" action="../actions/addIngredientAdmin.php"  enctype="multipart/form-data"   > 
                        <div class="mb-3">
    <label for="simpleinput" class="form-label">New Ingredient</label>
    <input name="nomIngredientAdmin" type="text" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add ingredient photo</label>
    <input  name="ingImage" type="file" id="ingImage" class="form-control">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">Calories</label>
    <input name="caloriesIngredientAdmin" type="number" id="simpleinput" class="form-control">
</div>
          
<select name="healthy[]" class="form-select mb-3">
    <option selected>Healthy ingredient</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
</select> 

<select name="season[]" class="form-select mb-3">
    <option selected>Season</option>
    <option value="summer">summer</option>
    <option value="winter">winter</option>
    <option value="spring">spring</option>
    <option value="autumn">autumn</option>
</select> 




<div class="mb-3">


<?php
       $controller=new myController();
       $table=$controller->getAllNutritions();
        echo
          '

   <div style="display:flex ; align-items:center;" >
  <select  id="selectNutrition" name="nutritions[]" class="form-select">
    <option selected>Add Nutrition</option>';
 
     foreach ($table as $row) {
echo 
    '<option value="'.$row["idNutrition"].'">'.$row["nomNutrition"].'</option>';}
    ?>
</select>
   <input style="margin-left:10px;" placeholder="add quantity" id="quantityNutritionsContainer" type="text" id="simpleinput" class="form-control">
   </div>
</div>
 
<div style="margin-bottom:10px;" class="btn btn-primary mb-2" id="buttonNutritions" >add nutrition info</div>
<ul id="nutritionsContainer">



</ul>
<div class="col-auto">
<script>


$("#buttonNutritions").click(function () {
  ingredient= $("#selectNutrition").children("option:selected").html();
  quantity= $("#quantityNutritionsContainer").val();
  text ='<li style="display:flex;align-items:center;" ><input  class="form-control" name="nutritionsContainer[]" style="margin-right:10px;" value="'+ingredient+'"/> <input  class="form-control" name="quantity[]" value="'+quantity+'"/></li>';
  $("#nutritionsContainer").append(text); 
});
</script>
            <button id="somebutton" type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        </form>

                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }



  public function adminCreateRecipePage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Recipe</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                       
                        <form method="POST" action="../actions/addRecipeAdmin.php"  enctype="multipart/form-data"   > 
                        
                        <select name="categorieRecette[]" class="form-select mb-3">
    <option selected>Category</option>
    <option value="1">Entrees</option>
    <option value="2">Plats</option>
    <option value="3">Boissons</option>
    <option value="4">Desserts</option>
</select>    

                        <div class="mb-3">
    <label for="simpleinput" class="form-label">News title</label>
    <input name="titreRecetteAdmin" type="text" id="simpleinput" class="form-control">
</div>
                        
                        <div class="mb-3">
    <label for="example-textarea" class="form-label">Add news description</label>
    <textarea  name="descriptionRecetteAdmin" class="form-control" id="example-textarea" rows="5"></textarea>
</div>

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add photos</label>
    <input id="imageRecette"  name="imageRecette" type="file" id="example-fileinput" class="form-control">
</div>

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add video</label>
    <input name="videoRecette" type="file" id="example-fileinput" class="form-control">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">Calories</label>
    <input name="caloriesRecetteAdmin" type="number" id="simpleinput" class="form-control">
</div>


<div >
<label for="simpleinput" class="form-label">Preparation time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="preparationTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="preparationTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div >
<label for="simpleinput" class="form-label">Rest time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="restTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="restTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div >
<label for="simpleinput" class="form-label">Cooking time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="cookingTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="cookingTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div >
<label for="simpleinput" class="form-label">Total time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="totalTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="totalTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div class="mb-0">
    <label for="example-range" class="form-label">Difficulty</label>
    <input name="difficulteRecette" class="form-range" id="example-range" type="range" name="range" min="0" step="1"  max="10">
</div>

<select name="saisonRecette[]" class="form-select mb-3">
    <option selected>Season</option>
    <option value="summer">Summer</option>
    <option value="winter">Winter</option>
    <option value="spring">Spring</option>
    <option value="autumn">Autumn</option>
</select> 

<select name="healthy[]" class="form-select mb-3">
    <option selected>Healthy recipe</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
</select> 

<select name="news[]" class="form-select mb-3">
    <option selected>News recipe</option>
    <option value="1">Yes</option>
    <option value="0" >No</option>
</select>

<select name="fetes[]" class="form-select mb-3">
    <option value="party" selected>Party recipe</option>
    <option value="yennayer">Yennayer</option>
    <option value="adha">Aid el adha</option>
    <option value="fitr">Aid el fitr</option>
    <option value="mawlid">El mawlid nabawi</option>
    <option value="marriage">Marriage</option>
    <option value="achoura">Achoura</option>
</select>


<ul  id="stepsContainer">
<p>Steps</p>
<li>
<div class="mb-3">
    <label for="example-textarea" class="form-label">Add news description</label>
    
    <textarea name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea>
</div>


</li>
</ul>

<div style="margin-bottom:10px;" class="btn btn-primary mb-2" id="buttonStep" >add step </div>

<ul id="ingredientsContainer">



</ul>

<?php
       $controller=new myController();
       $table=$controller->getAllIngredients();
        echo
          '
<div class="mb-3">
   <div style="display:flex ; align-items:center;" >
  <select style="margin-right:10px;"  id="selectIng" class="form-select">
    <option selected>Add ingredient</option>';
 
     foreach ($table as $row) {
echo 
    '<option value="'.$row["idIngredient"].'">'.$row["nomIngredient"].'</option>';}
    ?>
</select>


   <input placeholder="add quantity" id="quantityIngredientsContainer" type="text" id="simpleinput" class="form-control">
   </div>
</div>
 
<div style="margin-bottom:10px;" class="btn btn-primary mb-2" id="buttonIngredients" >add ingredient  </div>
<div class="col-auto">
<script>
$("#buttonStep").click(function () {
  $("#stepsContainer").append('<li><div class="mb-3"><label for="example-textarea" class="form-label">Add news description</label><textarea name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea></div></li>');
});

$("#buttonIngredients").click(function () {
  ingredient= $("#selectIng").children("option:selected").html();
  quantity= $("#quantityIngredientsContainer").val();
  text = '<li style="display:flex;align-items:center;" ><input class="form-control" name="ingredientsContainer[]" style="margin-right:10px;" value="'+ingredient+'"/> <input class="form-control" name="quantity[]" value="'+quantity+'"/></li>';
  $("#ingredientsContainer").append(text);


 
  //$("#ingredientsContainer").append('<li><div class="mb-3"><label for="example-textarea" class="form-label">Add news description</label><textarea name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea></div></li>');
});
</script>
            <button id="somebutton" type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        </form>

                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }

  public function adminIngredientsPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div style="display:flex;align-items:center;justify-content:center;" class="page-title-right">  
                                    <a href="addIngredientPage.php" ><button style="padding:3px 8px; border:1px solid lightgray; background-color:transparent; margin-right:10px; " type="submit">Add ingredient</button></a>                            
                                    </div>
                                    <h4 class="page-title">Ingredients</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <table class="table table-centered mb-0">
                            <thead class="table-dark">
                                <tr>
                                <th>Ingredient</th>
                                    <th>Name</th>
                                    <th>Calories</th>
                                    <th>Season</th>
                                    <th>Healthy</th>
                                    <th>Actions</th>
            
                                </tr>
                            </thead>
                            <tbody class="recetteAdmin" >
                            <?php
                            $healthy = array("No", "Yes");
                              $controller=new myController();
                              $table=$controller->getAllIngredients();
                            foreach ($table as $row) {
                              echo '
                              <tr>
                              <td>
                            
                              <img src="../../pictures/ingredients/'.$row["imageIngredient"].'" class="rounded-circle mr-3" style="width: 60px; height:60px; margin-right:5px;"
                              alt="Avatar" />
                              </td>
                                    <td>'.$row["nomIngredient"].'</td>
                                    <td>'.$row["caloriesIngredient"].'</td>
                                    <td>  
                                    '.$row["saisonIngredient"].'
                                    </td>
                                    <td>'.$healthy[$row["healthy"]].'</td>
                                    <td class="table-action">
                                <a href="../actions/deleteIngredient.php?deleteIngredient='.$row["idIngredient"].'" class="action-icon"><i class="mdi mdi-delete"></i></a>
                                  
                                    </td>
                                </tr>
                              ';
                            }
                            ?> 
                            </tbody>
                        </table>
                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }

  public function displayUpdateNews($id)
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Update News</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                       <?php
                       echo '<form method="POST" action="../actions/updateNewsAdmin.php?updateNews=' . $id . '"   > ';

$controller=new myController();
$table=$controller->getOneNews($id);
foreach ($table as $row) {
                     echo'   
                      
                        <div class="mb-3">
    <label for="simpleinput" class="form-label">News title</label>
    <input name="titreNewsAdmin" value="'.$row["titreNews"].'" type="text" id="simpleinput" class="form-control">
</div>
                        
                        <div class="mb-3">
    <label for="example-textarea" class="form-label">Add news description</label>
    <textarea  name="descriptionNewsAdmin" class="form-control" id="example-textarea" rows="5">'.$row["descriptionNews"].'</textarea>
</div>';
}
?>  



<div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        </form>

                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }



  public function adminNewsPage()
  {
    ?>
  <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">    
        <?php
        $this->sidebarAdmin();
        ?>
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <?php
        $this->navbarAdmin();
        ?>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add News</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                       
                        <form method="POST" action="../actions/addNews.php"  enctype="multipart/form-data"   > 
                        
                        <div class="mb-3">
    <label for="simpleinput" class="form-label">News title</label>
    <input name="titreNews" type="text" id="simpleinput" class="form-control">
</div>
                        
                        <div class="mb-3">
    <label for="example-textarea" class="form-label">Add news description</label>
    <textarea name="descriptionNews" class="form-control" id="example-textarea" rows="5"></textarea>
</div>

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add photos</label>
    <input id="imageNews"  name="imageNews" type="file" id="example-fileinput" class="form-control">
</div>

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add video</label>
    <input name="videoNews" type="file" id="example-fileinput" class="form-control">
</div>

<div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
        </form>

                </div>
                <!-- content -->
            </div>
        </div>
<script src="../filters.js" ></script>
    </body>
</html>
      <?php
  }


  public function myHeadCategory()
  {
    ?>
     <!doctype html>
<html lang="en">
  <head>
    <title>Carousel 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/popper.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/owl.carousel.min.js"></script>
    <script src="../../../js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/home.css">
    

  </head>
          <?php
  }

  public function loginHead()
  {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styleLogin.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login Page</title>
</head>
<?php
  }



  public function profileHead()
  {
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
        <link rel="stylesheet" href="../../profile.css">
        <link rel="stylesheet" href="../../css/home.css">
        <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/home.css">


    </head>
              <?php
  }

  public function loginPage()
  {
    ?>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="./images/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign In</h1>
                <div>Please login to use the platform</div>
            </div>
            <form method="post" action="login.php" class="login-card-form">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input name="emailUtilisateur" type="text" placeholder="Enter Email" id="emailForm" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input name="motDePasseUtilisateur" type="password" placeholder="Enter Password" id="passwordForm"
                     required>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="register.php">Create a free account.</a>
            </div>
        </div>
       


</html>

          <?php
  }

  public function registerPage()
  {
    ?>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="./images/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1 style="margin-bottom:-15px;">Sign Up</h1>
            </div>
            <form action="addUser.php" method="post" class="login-card-form" enctype="multipart/form-data">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Enter first name" name="nomUtilisateur" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Enter second name" name="prenomUtilisateur" 
                     required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" placeholder="Enter Email" name="emailUtilisateur" 
                     required>
                </div>

               
                    <input style="background-color:transparent; margin-right:20px; padding:3px 10px; border-radius:18px;height:40px;border-width:1px; " type="date" placeholder="Birthday" name="bdUtilisateur" 
                     required>
                

                <select  style="background-color:transparent; margin-right:20px; padding:3px 10px; border-radius:18px;height:40px; " name="sexeUtilisateur">
    <option value="">Sex</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
</select>
<div style="display:flex;align-items:center;" class="form-item">
<input type="file" style="display:none;" id="imageUser" name="imageUtilisateur" >

<div for="imageUser" style="background-image: url(../../pictures/meryem2.webp) ;background-position: center; background-size: cover;  border-radius:100%;height:50px;width:50px;margin-right:10px;"></div><label for="imageUser" >add profile picture</label>

                     </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" name="motDePasseUtilisateur"
                     required>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Already have an account? <a href="indexx.php">Connect to your account.</a>
            </div>
        </div>
       

</body>

</html>
<?php
  }

  public function recipeDetailsHead(){
    ?>
<!doctype html>
<html lang="en">
<head>
<title>Carousel 03</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<link rel="stylesheet" href="../../../css/main.css">
<link rel="stylesheet" href="../../../css/normalize.css">
<link rel="stylesheet" href="../../../css/home.css">
<link rel="stylesheet" href="../../../css/style.css">



</head>
    <?php
      }


      public function newsDetailsPage($id){
        ?>
       <body>
       <?php
              session_start();

       $this->navbarOneDetails();
       $this->navbarTwoDetails();
       $controller=new myController();
       $table=$controller->getOneNews($id);
    foreach ($table as $row) {
         echo '<div class="recipe-details">
      <h5>' . $row["titreNews"] . '</h5>
    <img src="../../../pictures/news/' . $row["linkImage"] . '" />
    <div class="description-recipe-style">' . $row["descriptionNews"] . '</div>
    <video   src="../../../videos/' . $row["idVideo"] . '" width="70%" height="400px" preload="auto" controls style="margin-top:40px;" >   </video>

    <div>
      
   
    
      
      
      
      ';


     /* echo '
      <div style="width:100vw; margin-left:-23.49%; margin-bottom:-50px; box-sizing:border-box;  ">
      ';
      $this->footer();

echo'        </div>
      ';*/

}
?>












<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
<script>
var body = document.getElementsByTagName('nav')[0];
var body1 = document.getElementsByTagName('nav')[1];

        // green
        body.style.backgroundColor = '#ffffff';
body1.style.backgroundColor = '#ffffff';

 
//body.style.backgroundColor = 'green';

// trigger this function every time the user scrolls


</script>
</body>
</html>        
    <?php
      }


      public function recipeDetailsPage($id){
        ?>
       <body>
       
       <?php
       session_start();
       $this->navbarOneDetails();
       $this->navbarTwoDetails();
      


       $controller=new myController();
       $table=$controller->getOneRecette($id);
    foreach ($table as $row) {
      $tempsTotal = $row["tempsTotal"]/60 ;
      $whole = floor($tempsTotal);      // 1
$fraction = ($tempsTotal - $whole)*60; // .25
$tempsTotal = $whole.'h'. $fraction.'min' ;

$tempsPrep = $row["tempsPreparation"]/60 ;
$whole = floor($tempsPrep);      // 1
$fraction = ($tempsPrep - $whole)*60; // .25
$tempsPrep = $whole.'h'. $fraction.'min' ;

$tempsCuisson = $row["tempsCuisson"]/60 ;
$whole = floor($tempsCuisson);      // 1
$fraction = ($tempsCuisson - $whole)*60; // .25
$tempsCuisson = $whole.'h'. $fraction.'min' ;

$tempsRepos = $row["tempsRepos"]/60 ;
$whole = floor($tempsRepos);      // 1
$fraction = ($tempsRepos - $whole)*60; // .25
$tempsRepos = $whole.'h'. $fraction.'min' ;
      echo '
      
      <div class="recipe-details">
      <h5>'.$row["titreRecette"].'</h5>
      <img src="../../../pictures/recipes/'.$row["linkImage"].'" />
      <div>
      <div class="description-recipe-style">'.$row["descriptionRecette"].'</div>
      <div   class="recipe-icons">
     <div style="width:40%;" >
     <article style="margin-bottom:10px;" class="cooking-icon-style">
     <i class="fas fa-clock"></i>
     <h5 style="margin-left: 10px; margin-right: 10px;">preparation time</h5>
     <p style="font-weight: bold;" >'.$tempsPrep.'</p>
     </article>
     <article class="cooking-icon-style">
     <i class="far fa-clock"></i>
     <h5 style="margin-left: 10px; margin-right: 10px;">cooking time</h5>
     <p style="font-weight: bold;" >'.$tempsCuisson.'</p>
     </article>
     </div>
      
     <div style="width:40%;">
     <article style="margin-bottom:10px;" class="cooking-icon-style">
      <i class="fas fa-clock"></i>
      <h5 style="margin-left: 10px; margin-right: 10px;">rest time</h5>
      <p style="font-weight: bold;" >'.$tempsRepos.'</p>
      </article>
      
      <article class="cooking-icon-style">
      <i class="far fa-clock"></i>
      <h5 >total time</h5>
      <p style="font-weight: bold; " >'.$tempsTotal.'</p>
      </article> 
     </div>

      </div> 
      
      <div class="recipe-icons">
      <div class="rate">
      ';
      for ($x =5; $x > $row["notation"]; $x--) {
       echo '
       <input  type="radio" id="star' . $x . '" name="rate" value="' . $x . '" />
       <label for="star' . $x . '" title="text">' . $x . ' stars </label>';
          
     }
      for ($x = $row["notation"]; $x >= 1; $x--) 
      {
           if ($x == $row["notation"]) {
             echo '<input checked type="radio" id="star' . $x . '" name="rate" value="' . $x . '" />
        <label for="star' . $x . '" title="text">' . $x . ' stars</label>';
           }
           else
           {
            echo '<input  type="radio" id="star' . $x . '" name="rate" value="' . $x . '" />
            <label for="star' . $x . '" title="text">' . $x . ' stars</label>';
           }
      }
      

     
        
       
       echo' </div>';
        
         if (isset($_SESSION['currentUser'])) {
           echo '
      <form  method="POST" class="save-like">
        <span><a href="../likeRecipe.php?likeId='.$id.'" ><i  class="far fa-heart fa-2xl"></i></a><span>' . $row["compteurLike"] . '</span></span>
        <span><i class="far fa-regular fa-bookmark fa-2xl"></i><span>Save</span></span>
      </form>';
         }
      echo'<article style="display: flex; align-items: center; justify-content: center;" >
      <h5>Difficulty</h5>
      <p style="font-weight: bold;">'.$row["difficulteRecette"].' / 10</p>
      </article>
      </div>
      
      
      <video  src="../../../videos/'.$row["linkVideo"].'" width="100%" height="400px" preload="auto" controls style="margin-bottom:30px;" >   </video>

      </div>
      
      

      <section class="recipe-content">
      <article>
      <h4 style="font-weight:600;">instructions</h4>';
      //<!-- single instruction -->
      $steps=$controller->getRecipeSteps($id);
      foreach ($steps as $step) {
        echo '
      <div class="single-instruction">
      <header>
      <p>step '.$step["numeroEtape"].'</p>
      <div></div>
      </header>
      <div class="instruction">
     '.$step["contenuEtape"].'
      </div>
      </div>

      </article>
      
      </section>';
    }
         echo
           '<section class="recipe-content">
    <div  >
    <h4  style="font-weight:600;">ingredients</h4>
    ';
    $index = 1;
    $ingredients=$controller->getRecipeIngredients($id);
         foreach ($ingredients as $ingredient) {
          echo
          '
          <div class="single-instruction">
          <header>
            <p>Ingredient '.$index. '</p>
            <div></div>
          </header>
          <div class="instruction">'
          .$ingredient["quantite"]. ' '
          .$ingredient["nomIngredient"].
          '</div>
          </div>
       ';
       $index++;
        }


}
?>


<section style="display:flex; align-items:center;justify-content:space-between;" >
<h4  style="font-weight:600;">Note this recipe</h4>
<form method="POST">
<input style="width:200px; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;"  type="range"  id="rangeNote" min="0" max="5" step="1" />
<?php
echo'<input type="submit" name="'.$row["idRecette"].'" id="noteRecipeBtn"  value="submit note" />';
?>
</form>
</section>








<script src="../../../js/jquery.min.js"></script>
<script src="../../../js/popper.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/owl.carousel.min.js"></script>
<script src="../../../js/main.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">


<script src="https://code.jquery.com/jquery-3.1.1.min.js">

<script src="../../jqueryFilters/milo.js"></script>


<?php
     /*   echo '
        <div style="width:100vw; margin-left:-23.49%; margin-bottom:-50px; box-sizing:border-box;  ">
        ';
        $this->footer();

echo'        </div>
        ';
*/
        ?>

</body>
</html>        
    <?php
      }

  public function addRecipeHead()
  {
    ?>
                 <!doctype html>
<html lang="en">
  <head>
    <title>Add recipe</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="../../addRecipe/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- STYLE CSS -->
    <link href="../../addRecipe/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->


    <script src="../../addRecipe/assets/js/vendor.min.js"></script>
        <script src="../../addRecipe/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="../../addRecipe/assets/js/vendor/apexcharts.min.js"></script>
        <script src="../../addRecipe/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../../addRecipe/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../../addRecipe/js/jquery-3.3.1.min.js"></script>
    
    <!-- JQUERY STEP -->
    <script src="../../addRecipe/js/jquery.steps.js"></script>



    <script src="../../addRecipe/js/main.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="../../addRecipe/assets/js/pages/demo.dashboard.js"></script>


    <link rel="stylesheet" href="../../addRecipe/css/style.css">


    <link href="../../addRecipe/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="../../addRecipe/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link rel="stylesheet" href="../../css/home.css">
  </head>
              <?php
  }

  public function addRecipeForm()
  {
    ?>
    <body>
    <?php
       $this->navbarOne();
       $this->navbarTwo();
    ?>
   <div style="padding:160px 2rem 40px 2rem ;" >
    <form style="display:flex;justify-content:space-between;" method="POST" action="../../admin/actions/addRecipeUser.php"  enctype="multipart/form-data"   > 
                        <div style="width:50% ; padding-right:30px; border-right:1px solid lightgray;"; >
                        <label for="simpleinput" class="form-label">Category</label>
                        <select name="categorieRecette[]" class="form-select mb-3">
    <option selected>Category</option>
    <option value="1">Entrees</option>
    <option value="2">Plats</option>
    <option value="3">Boissons</option>
    <option value="4">Desserts</option>
</select>    
                        <div class="mb-3">
    <label for="simpleinput" class="form-label">News title</label>
    <input name="titreRecetteAdmin" type="text" id="simpleinput" class="form-control">
</div>
                        
                        <div class="mb-3">
    <label for="example-textarea" class="form-label">Add news description</label>
    <textarea style="  height: 150px;" name="descriptionRecetteAdmin" class="form-control" id="example-textarea" rows="5"></textarea>
</div>

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add photos</label>
    <input style="  height: 100%;" id="imageRecette"  name="imageRecette" type="file" id="example-fileinput" class="form-control">
</div>

<div class="mb-3">
    <label for="example-fileinput" class="form-label">Add video</label>
    <input style="height: 100%;" name="videoRecette" type="file" id="example-fileinput" class="form-control">
</div>

<div class="mb-3">
    <label for="simpleinput" class="form-label">Calories</label>
    <input name="caloriesRecetteAdmin" type="number" id="simpleinput" class="form-control">
</div>


<div >
<label for="simpleinput" class="form-label">Preparation time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="preparationTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="preparationTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div >
<label for="simpleinput" class="form-label">Rest time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="restTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="restTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div >
<label for="simpleinput" class="form-label">Cooking time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="cookingTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="cookingTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

</div>

<div style="width:48% ; padding-left:10px;" >


<div >
<label for="simpleinput" class="form-label">Total time</label>
<div style="display:flex; align-items:center; " >
<div style="margin-right:10px;"  class="mb-3">
    <input name="totalTimeHour" type="number" id="simpleinput" class="form-control">
</div>
<div class="mb-3">
    <input name="totalTimeMin" type="number" id="simpleinput" class="form-control">
</div>
</div>
</div>

<div class="mb-0">
    <label for="example-range" class="form-label">Difficulty</label>
    <input name="difficulteRecette" class="form-range" id="example-range" type="range" name="range" min="0" step="1"  max="10">
</div>

<select name="saisonRecette[]" class="form-select mb-3">
    <option selected>Season</option>
    <option value="summer">Summer</option>
    <option value="winter">Winter</option>
    <option value="spring">Spring</option>
    <option value="autumn">Autumn</option>
</select> 

<select name="healthy[]" class="form-select mb-3">
    <option selected>Healthy recipe</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
</select> 


<select name="fete[]"  class="form-select mb-3">
<option value="" selected>Party recipe</option>
    <option value="yennayer">Yennayer</option>
    <option value="adha">Aid el adha</option>
    <option value="fitr">Aid el fitr</option>
    <option value="mawlid">El mawlid nabawi</option>
    <option value="marriage">Marriage</option>
    <option value="achoura">Achoura</option>
</select>

<ul  id="stepsContainer">
<p>Steps</p>
<li>
<div class="mb-3">
    <label for="example-textarea" class="form-label">Add news description</label>
    
    <textarea style="height: 150px;" name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea>
</div>


</li>
</ul>

<div style="background-color:#1c3f34;border:none;color:#fff;margin-left:70%;"  class="btn mb-2" id="buttonStep" >add step</div>

<ul style="list-style:none;margin:0;padding:0; " id="ingredientsContainer">



</ul>

<?php
       $controller=new myController();
       $table=$controller->getAllIngredients();
        echo
          '
<div class="mb-3">
   <div style="display:flex ; align-items:center;" >
  <select style="margin-right:10px;" id="selectIng" name="ingredients[]" class="form-select">
    <option  selected>Add ingredient</option>';
 
     foreach ($table as $row) {
echo 
    '<option style="height:100%;" value="'.$row["idIngredient"].'">'.$row["nomIngredient"].'</option>';}
    ?>
</select>


   <input placeholder="add quantity" id="quantityIngredientsContainer" type="text" id="simpleinput" class="form-control">
   </div>
</div>
 
<div  style="background-color:#1c3f34;border:none;color:#fff; margin-left:70%;" class="btn mb-2" id="buttonIngredients" >add ingredient</div>
<div class="col-auto">
<script>
$("#buttonStep").click(function () {
  $("#stepsContainer").append('<li><div class="mb-3"><label for="example-textarea" class="form-label">Add news description</label><textarea style="  height: 150px;" name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea></div></li>');
});

$("#buttonIngredients").click(function () {
  ingredient= $("#selectIng").children("option:selected").html();
  quantity= $("#quantityIngredientsContainer").val();
  text = '<li style="display:flex;align-items:center;margin-bottom:15px;" ><input class="form-control" name="ingredientsContainer[]" style="margin-right:10px;" value="'+ingredient+'"/> <input class="form-control" name="quantity[]" value="'+quantity+'"/></li>';
  $("#ingredientsContainer").append(text);


 
  //$("#ingredientsContainer").append('<li><div class="mb-3"><label for="example-textarea" class="form-label">Add news description</label><textarea name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea></div></li>');
});
</script>
            <button id="somebutton" type="submit" style="background-color:#1c3f34;border:none;color:#fff;margin-left:70%;" class="btn mb-2">Submit</button>
        </div>

        </div>
        </form>
        </div>


</body>
</html>
          <?php
  }



  public function navbarOne()
  {
    ?>
          <nav>
    <div>
<img src="../../images/logo.png" />
    </div>
    <div>
    <?php
    session_start();
    if(!isset($_SESSION['currentUser']))
   {
    echo'<div>
    <a  style="font-weight: bold;" href="indexx.php" >Sign up</a>
    <a style="color:black;font-weight: bold;" href="register.php">Sign in</a>
    </div>';}
    else{

      $controller=new myController();
      $table=$controller->getUser($_SESSION['currentUser']);
   foreach ($table as $row) {
    echo'
    <a href="profilePage.php" class="d-flex align-items-center justify-content-start">
    <img src="../../pictures/profile/'.$row["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px;"
    alt="Avatar" />
    <p style="color:black;" >'.$row["nomUtilisateur"].' '.$row["prenomUtilisateur"].'</p>
    </a>
    <a style="font-size:14px;font-weight: bold;  background-color: #1c3f34;
    color: #ffffff;
    margin-right: 10px;
    border-radius: 40px;
    height: 40px;
    width: 100px;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;" href="logout.php" >Log out</a>
    ';
  }    
      
  
    }
    ?>
    
      <ul >
      <li > <a  href="#">
        <i class="fab fa-twitter fa-lg icon-color"></i>
        
        </a> </li>
      <li > <a  href="#">
        <i class="fab fa-facebook fa-lg icon-color"></i>
        </a> </li>
        <li > <a  href="#">
        <i class="fab fa-instagram fa-lg icon-color"></i>
        </a> </li>
        <li > <a  href="#">
        <i class="fab fa-linkedin fa-lg icon-color"></i>
        </a> </li>
      </ul>
    </div>
    </nav>
      <?php
  }

  public function navbarOneDetails()
  {
    ?>
          <nav style="
    display: flex;width: 100%;align-items: center;justify-content: space-between;padding-left: 20px; padding-right: 20px; box-sizing: border-box;
    height: 80px;
    position: fixed;
    top: 0;
    z-index: 9999;
    background-color: #fff;">
    <div>
<img style="height:120px;width:120px;" src="../../../images/logo.png" />
    </div>
    <div>
  

    <?php
    
    if(!isset($_SESSION['currentUser']))
   {
    echo'<div>
    <a  style="font-weight: bold;" href="../indexx.php" >Sign up</a>
    <a style="color:black;font-weight: bold;" href="../register.php">Sign in</a>
    </div>';
  }  
    else{
      $controller=new myController();
      $table=$controller->getUser($_SESSION['currentUser']);
   foreach ($table as $row) {
    echo'
    <a href="../profilePage.php" style="display:flex;align-items:center;justify-content:center;"  >
    <img src="../../../pictures/profile/'.$row["imageUtilisateur"].'" style="width: 60px;height:60px;border-radius:100%;"
    alt="Avatar" />
    <p style="color:black;margin-left:10px; margin-top:10px; font-size:15px; " >'.$row["nomUtilisateur"].' '.$row["prenomUtilisateur"].'</p>
    </a>
    <a style="font-size:14px;font-weight: bold;  background-color: #1c3f34;
    color: #ffffff;
    margin-right: 10px;
    border-radius: 40px;
    height: 40px;
    width: 100px;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;" href="../logout.php" >Log out</a>
    ';
  }    
      
  
    }
    ?>
    
      <ul >
      <li > <a  href="#">
        <i class="fab fa-twitter fa-lg icon-color"></i>
      </a> </li>
      <li > <a  href="#">
        <i class="fab fa-facebook fa-lg icon-color"></i>
        </a> </li>
        <li > <a  href="#">
        <i class="fab fa-instagram fa-lg icon-color"></i>
        </a> </li>
        <li > <a  href="#">
        <i class="fab fa-linkedin fa-lg icon-color"></i>
        </a> </li>
      </ul>
    </div>
    </nav>
      <?php
  }


  public function navbarTwoDetails()
  {
    ?>
                <nav  class="navTwo">
    <ul style="margin-bottom:-2px;">
      <li>
      <a class="nav-link1" href="../homeAuth.php">Home</a>
      </li>
      <li >
      <a class="nav-link1" href="../news.php">News</a>
      </li>
      <li>
      <a class="nav-link1" href="../ideesRecette.php">Recipies</a>
      </li>
      <li >
      <a class="nav-link1" href="../healthy.php">Healthy</a>
      </li>
      <li >
      <a class="nav-link1" href="../saison.php">Saison</a>
      </li>
      <li >
      <a class="nav-link1" href="../fete.php">Fetes</a>
      </li>
      <li >
      <a class="nav-link1" href="../nutrition.php">Nutrition</a>
      </li>
      <li >
      <a class="nav-link1" href="../contact.php">Contact</a>
      </li>
    </ul>
    </nav>
          <?php
  }

  public function sidebarAdmin()
  {
    ?>
  <div  style="background-color:#313A46;
            width:260px;z-index:10;bottom:0;position:fixed;top:0;padding-top:70px;-webkit-box-shadow:0 0 35px 0 rgba(154,161,171,.15);box-shadow:0 0 35px 0 rgba(154,161,171,.15)
            " >
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                        <img src="../../images/logo.png" alt="" height="120">
                </a>

            
    
                <div style="margin-top:50px;" class="h-100" id="leftside-menu-container" data-simplebar="">

                    <!--- Sidemenu -->
                    <ul class="side-nav">                     

                        <li class="side-nav-item">
                            <a href="recipesPage.php" class="side-nav-link">
                            <i class="fas	fa-pizza-slice"></i>
                            <span> Recipes </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="adminNewsPageMain.php" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> News </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="usersPage.php" class="side-nav-link">
                                <i class="far fa-regular fa-user"></i>
                                 <span> Users </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="ingredientsPage.php" class="side-nav-link">
                                <i class="fas	fa-apple-alt"></i>
                                <span> Nutrition </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="adminDiapoPage.php" class="side-nav-link">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                                                            <span> Settings </span>
                                                            

                                                            

                            </a>
                        </li>
                    </ul>

                 

                </div>
                </div>

          <?php
  }

  public function navbarAdmin()
  {
    ?>
  <div class="navbar-custom">
                        <ul style="display:flex;align-items:center;" class="list-unstyled topbar-menu float-end mb-0">

                            <li style="display:flex;align-items:center;justify-content:center;" >
                                <a class="nav-link end-bar-toggle" href="../../user/actions/logout.php">
                                    Log out
                                </a>
                            </li>

            


                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                    <?php
                                    
                                    $controller = new myController();                                   
                                    $table=$controller->getUser(1);
                                    foreach ($table as $row) {
                                      echo '<img src="../../pictures/profile/' . $row["imageUtilisateur"] . '"   alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">' . $row["nomUtilisateur"] .'</span>
                                        <span class="account-position">' . $row["prenomUtilisateur"] . '</span>';
                                    }
                                        ?>
                                    </span>
                                </a>
                             
                                   

                              
                            </li>

                        </ul>
                       
                      
                          
                    </div>
          <?php
  }


  public function navbarTwo()
  {
    ?>
                <nav>
    <ul styel=" ">
      <li style="
  ">
      <a class="nav-link1" href="homeAuth.php">Home</a>
      </li>
      <li >
      <a class="nav-link1" href="news.php">News</a>
      </li>
      <li>
      <a class="nav-link1" href="ideesRecette.php">Recipies</a>
      </li>
      <li >
      <a class="nav-link1" href="healthy.php">Healthy</a>
      </li>
      <li >
      <a class="nav-link1" href="saison.php">Saison</a>
      </li>
      <li >
      <a class="nav-link1" href="fete.php">Fetes</a>
      </li>
      <li >
      <a class="nav-link1" href="nutrition.php">Nutrition</a>
      </li>
      <li >
      <a class="nav-link1" href="contact.php">Contact</a>
      </li>
    </ul>
    </nav>
          <?php
  }

  public function displayRecipeIdeasPageResult($data){
    ?>
    <body>
      <?php
        $this->navbarOne();
        $this->navbarTwo();


      echo '<div style="margin-top:170px;" >';
        $this->showTitle("Recipe ideas");
      echo '</div>';
               echo'
               <div style="display:flex ; justify-content:space-between; padding:0 1rem;" >

               <div style=" padding:10px;    width:18%; height:100%; border:1px solid lightgray">
               <div>
               <input id="summerF" type="checkbox" value="summer"  />
               <label for="summerF">Summer</label>
               </div>
               <div>
               <input id="winterF" type="checkbox" value="winter" />
               <label for="winterF">Winter</label>
               </div>
               <div>
               <input id="springF" type="checkbox" value="spring" />
               <label for="springF">Spring</label>
               </div>
               <div>
               <input id="autumnF" type="checkbox" value="autumn" />
               <label for="autumnF">Autumn</label>
               </div>

            
               <button style="border:none;width:100%;background-color:#1c3f34;color:#fff;" id="yarab"> submit</button>
               </div>
               
               <div style="width:80%;" >
        <div style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr ; grid-gap:20px;">';
      foreach($data as $item){
        $this->displayOneRecipeIdeas($item);
      }
      
    ?>
    </div>
    </div>
    </div>
    <?php
     ## $this->footer();
      ?>
</body>

</html>
<script>
$("#yarab").click(function(e){
e.preventDefault();
var value= $("input[type='checkbox']:checked").val();

if($("input[type='checkbox']").is(":checked")){
  $( ".zizou" ).not("."+value).hide();
}
else{
  console.log(value);
  $(".zizou").show();
}


})
</script>
<?php
    
  }
  public function displayRecipeIdeasPage(){
    ?>
    <body >
      <?php
        $this->navbarOne();
        $this->navbarTwo();
        $controller=new myController();
        $table=$controller->getAllIngredients();
         echo
           '
           <div style="margin-top:170px;" class="container">
           <div  class="col-md-12 text-start">
           <h4 style="font-size:24px;" class="heading-section fw-bold">Search recipe ideas</h4>      
     </div>

           <form method="POST" action="searchRecipes.php" style="margin:auto; padding-top:2rem; width:70%;  min-height:200px ;display:flex;flex-direction:column; align-items:center; background-color:#fff; " >
   <div style=" display:flex; align-items:center;justify-content:start;">
           <select style="background-color:transparent; font-weight:600; border:1px solid #1c3f34 ; width:200px; margin-right:15px;"   id="selectIng"  class="form-select">
     <option selected>Add ingredient</option>';
  
      foreach ($table as $row) {
 echo 
     '<option value="'.$row["idIngredient"].'">'.$row["nomIngredient"].'</option>';}
      echo '
 </select>
 <div style="color:#fff;background-color:#1c3f34;" class="btn" id="buttonIngredients" >add ingredient  </div>
</div>
<ul style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr; grid-gap:20px; margin-top:20px; " id="ingredientsBtn"  >
</ul>
<input type="submit"  class="btn" style="color:#fff;background-color:#1c3f34;margin-top:20px; margin-bottom:20px;"  value="search" />
  </form>
 ';


        ?>
        </div>
        <?php
     ## $this->footer();
      ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $("#buttonIngredients").click(function () {
  ingredient= $("#selectIng").children("option:selected").html();
  text = '<li style="display:flex;align-items:center;" ><input style="background-color:transparent; font-weight:600; border:none" class="form-control" name="ingredients[]" style="margin-right:10px;" value="'+ingredient+'"/></li>';
  $("#ingredientsBtn").append(text);


 
  //$("#ingredientsContainer").append('<li><div class="mb-3"><label for="example-textarea" class="form-label">Add news description</label><textarea name="stepsContainer[]" class="form-control" id="example-textarea" rows="5"></textarea></div></li>');
});
</script>
</body>
</html>
    <?php
  }

  public function footer(){
    ?>

<div style="
margin-top: 40px;
    height: 200px;
   width: 100%;
   display: flex;
   align-items: center;
   background-color:#1c3f34;
   color:#fff;
" >

 <div class="btm-container" >
	<div >
	<div class="col  flex flex-column flex-start flex-g-1">
      
        <p class="site-decription">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut turpis
          id fames dolor.
        </p>
        <div class="social-medias flex align-items-center flex-g-1">
			<i class="fab fa-facebook fa-2x icon"></i>
			<i class="fab fa-instagram fa-2x icon-color"></i>
			<i class="fab fa-twitter fa-2x icon-color"></i>
			<i class="fab fa-linkedin fa-2x icon-color"></i>
         
        </div>
		</div>

		<div class="col col-border flex flex-column flex-g-1 flex-start">
			<h3 class="col-title">Info</h3>
			<div class="col-list">
			  <ul>
				<li><a style=" color:#fff;" href="#">Formats</a></li>
				<li><a style=" color:#fff;" href="#">Compression</a></li>
				
			  </ul>
			</div>
		  </div>
		  <div class="col col-border flex flex-column flex-g-1 flex-start">
			<h3 class="col-title">Resources</h3>
			<div class="col-list">
			  <ul>
				<li><a style=" color:#fff;" href="#">Developer API</a></li>
				<li><a style=" color:#fff;" href="#">Tools</a></li>
				<li><a style=" color:#fff;" href="#">Blog</a></li>
			  </ul>
			</div>
		  </div>


	</div>
	<p style="margin-top:30px;">Made with <i class="far fa-heart icon-love"></i> by meryem</p>
 </div>


</div>

    <?php
  }
  public function displayHomePage(){
    ?>
      <?php
        $this->navbarOne();
        $this->navbarTwo();
      $this->diapoHomePage();
      $this->displayRecipesCategoryHome("1");
      $this->displayRecipesCategoryHome("2");
      $this->displayRecipesCategoryHome("3");
      $this->displayRecipesCategoryHome("4");
     ## $this->footer();
        ?>

 
            <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/main.js"></script>
    <?php
  }

  public function displayRecipesNews()
  {
    ?>
      <section style="margin-top:140px;" class="ftco-section">   
    <div class="container">
      <div class="row">

      <?php
      $this->showTitle("News");
      ?>

          <div class="col-md-12">
            <div style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr ; grid-gap:20px;">
   <?php
       $controller=new myController();
       $table=$controller->getNews();
    foreach ($table as $row) {
      $this->displayOneNews($row);
    }

    $table1=$controller->getNewsRecipes();
    foreach ($table1 as $row) {
      $this->displayOneRecipeNews($row);
    }
    ?>
    </div>
  </div>
      </div>
    </div>
      </section>
      
   

<?php
  }

  public function displayNutritions()
  {
    ?>
      <section style="margin-top:140px;" class="ftco-section">   
    <div class="container">
      <div class="row">

      
      <?php
      $this->showTitle("Nutrition");
      ?>

<ul style="margin-bottom:30px;" class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <button  class="nav-link " id="proteine" value="proteine" >proteine</button>
                                </li>
                                <li class="nav-item">
                                <button   class="nav-link " id="lipide"  value="lipide">lipide</button>
                                </li>
                                <li class="nav-item">
                                <button class="nav-link" id="fat"  value="fat">fat</button>
                                </li>
                                <li class="nav-item">
                                <button class="nav-link " id="glucide"  value="glucide">glucide</button
                                </li>
                                <li class="nav-item">
                                <button class="nav-link " id="Carbohydrate"  value="Carbohydrate">carbs</button
                                </li>
                        
                              </ul>

          <div class="col-md-12">
            <div class="filterNutrition" style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr ; grid-gap:20px;">
   <?php
       $controller=new myController();
       $table=$controller->getIngredientsNutrition();
    foreach ($table as $row) {

      $this->displayOneIngredient($row);
    }

    ?>
    </div>
  </div>
      </div>
      <script src="../jqueryFilters/nutrition.js" ></script>
    </div>
      </section>
<?php
  }


  public function displayNewsPage(){
    ?>
      <?php
        $this->navbarOne();
        $this->navbarTwo();
      $this->displayRecipesNews();
      
      ##$this->footer();
      
        ?>

 
            <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/main.js"></script>
    <?php
  }

  public function displayNutritionPage(){
    ?>
      <?php
        $this->navbarOne();
        $this->navbarTwo();
      $this->displayNutritions();

    ##  $this->footer();
    
        ?>

 
            <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <?php
  }

  public function displayHealthyPage(){
    ?>
      <?php
        $this->navbarOne();
        $this->navbarTwo();
      $this->displayRecipesHealthy(2000);
  
      ##$this->footer();
      
        ?>

 
            <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <?php
  }

  public function displaySaisonPage(){
    ?>
      <?php
        $this->navbarOne();
        $this->navbarTwo();
      $this->displayRecipesSaison();
      
   ##   $this->footer();
      
        ?>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="../../js/main.js"></script>
    <script src="../jqueryFilters/milo.js"></script>
    <?php
  }

  public function displayFetePage(){
    ?>
      <?php
        $this->navbarOne();
        $this->navbarTwo();
      $this->displayRecipesFete();
      
    ##  $this->footer();
      
        ?>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="../../js/main.js"></script>
    <?php
  }

  public function diapoHomePage()
  {
    ?>
                  <div style="height:500px;margin-top: 140px;" id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
    
		<div class="carousel-inner">
    <?php
     $controller=new myController();
     $table1=$controller->getDiaposRecette();
     $table2=$controller->getDiaposNews();
    echo '<div class="carousel-item active">
			<img style="object-fit:cover;height: 500px;width: 100%;" src="../../pictures/couscous.jpg" class="d-block w-100" alt="rien">
		  </div>';
     foreach ($table1 as $row) {
      echo '<div class="carousel-item">
		<img style="object-fit:cover;height: 500px;width: 100%;" src="../../pictures/diapos/'.$row["imageDiapo"].'" class="d-block w-100" alt="'.$row["linkImage"].'">
		  </div>';
    }


    foreach ($table2 as $row) {
      echo '<div class="carousel-item ">
			<img style="object-fit:cover;height: 500px;width: 100%;" src="../../pictures/diapos/'.$row["imageDiapo"].'" class="d-block w-100" alt="'.$row["linkImage"].'">
		  </div>';
    }
   
	
		 ?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
	  </div>
	  
	
                <?php
  }

  public function showCategory($cat)
  {
    ?>
                    <div class="col-md-12 text-start">
                    <?php
                    $cats = array("", "entrees", 'plats', 'boissons', 'desserts');
                    echo '<a style="color:black; " href="categoryRecipes.php/?cat=' .$cat. '"><h4 style="font-size:24px;" class="heading-section fw-bold">' . $cats[$cat] . '<small style="margin-left:3px;"> See all</small> </h4></a>';
                    ?>
          </div>
                <?php
  }

  public function showTitle($title)
  {
    ?>

<div class="col-md-12 text-start">
<?php
        echo '<h4 style="font-size:24px;" class="heading-section fw-bold">'.$title.'</h4>'; 
?>     
 </div>
                 
                <?php
  }

  public function displayOneNews($news)
  {
    ?>
 <?php
   echo '<a style="position:relative; text-decoration:none; color:#fff;" href="newsDetails.php/?id='.$news["idNews"].'">';
   ?>
  <div  class="item">
                <div class="work">
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/news/' . $news["linkImage"] . ');">           
                  </div>
                  <div style="height:150px; color:black;" class="d-flex flex-column align-items-start justify-content-center" >
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;" class="mt-2 fw-800 ">' . $news['descriptionNews'] . '</p>';
                    ?>
                  </div>
                  </div>
                </div>
              </div>
  </a>
                <?php
  }

  public function displayOneIngredient($news)
  {
    ?>

  <div  class="item">
                <div class="work" style="border:1px solid lightgray;"  >
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  $healthy = ["unhealthy", "healthy"];
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/ingredients/' . $news["imageIngredient"] . ');"> 
                  <div class="text w-100">

                  <span  class="cat">'.$news['saisonIngredient'].'</span>
                  <span class="cat" style="margin-left:70px;" >'.$healthy[$news['healthy']].'</span>

                  <span class="like" >'.$news['nomIngredient'].'
                  
               
                  </span>
                  

                </div>       
                  </div>
                  <div style="margin-top:-20px; height:200px; color:black;" class="d-flex flex-column align-items-center justify-content-center" >        
                    <div style="padding:0 20px; display:flex;flex-direction:column; align-items:center;justify-content:center;">';
                    $controller=new myController();
                    $table=$controller->getOneIngredientNutrition($news["idIngredient"]);
                 foreach ($table as $row) {
                  echo '
                  <div style="display:flex;align-items:center;justify-content:center;" >
                  <p style="margin:0; margin-right:10px;" >'.$row["nomNutrition"].'</p>
                  <p style="margin:0; ">'.$row["quantityNutrition"].'</p>
                  </div>';
                 };               
                    ?>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
  
                <?php
  }

  public function displayOneRecipeHome($recipe)
  {
    ?>
 <?php
   echo '<a sstyle="position:relative; text-decoration:none; color:#fff;" href="recipeDetails.php/?id='.$recipe["idRecette"].'">';
   ?>
  <div class="item">
                <div class="work">
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/recipes/'.$recipe["linkImage"].');">
                    <div class="text w-100">

                      <span class="like">'.$recipe["titreRecette"].'</span>

                    </div>
                  </div>
                  <div style="height:150px; color:black;" class="d-flex flex-column align-items-start justify-content-center" >

                  
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;" class="mt-2 fw-800 ">'.$recipe['descriptionRecette'].'</p>
                    <div class="d-flex align-items-center justify-content-start">
                    <img src="../../pictures/profile/'.$recipe["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px;"
                    alt="Avatar" />
                    <p>'.$recipe["nomUtilisateur"].' '.$recipe["prenomUtilisateur"].'</p>'
                    ?>
  
                    </div>
                  </div>
                  </div>
                </div>
              </div>
  </a>
                <?php
  }

  public function displayOneRecipe($recipe)
  {
    ?>
 <?php
   echo '<a sstyle="position:relative; text-decoration:none; color:#fff;" href="recipeDetails.php/?id='.$recipe["idRecette"].'">';
   ?>
  <div  class="item">
                <div class="work">
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/recipes/'.$recipe["linkImage"].');">
                    <div class="text w-100">

                      <span class="cat">'.$recipe['caloriesRecette'].'</span>
                      <span class="like"><i class="far fa-heart"></i>13</span>

                    </div>
                  </div>
                  <div style="height:150px; color:black;" class="d-flex flex-column align-items-start justify-content-center" >

                  
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;" class="mt-2 fw-800 ">'.$recipe['descriptionRecette'].'</p>
                    <div class="d-flex align-items-center justify-content-start">
                    <img src="../../pictures/profile/'.$recipe["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px;"
                    alt="Avatar" />
                    <p>'.$recipe["nomUtilisateur"].' '.$recipe["prenomUtilisateur"].'</p>'
                    ?>
  
                    </div>
                  </div>
                  </div>
                </div>
              </div>
  </a>
                <?php
  }

  public function displayOneRecipeIdeas($recipe)
  {
    ?>
 <?php
 if($recipe["saison"]=="")
 {
  echo '<a style="position:relative; text-decoration:none; color:#fff;" href="recipeDetails.php/?id=' . $recipe["idRecette"] . '">
  <div class="item zizou noSeason ' . $recipe["caloriesRecette"] . ' ">';
 } else {
         echo '<a style="position:relative; text-decoration:none; color:#fff;" href="recipeDetails.php/?id=' . $recipe["idRecette"] . '">
<div class="item zizou ' . $recipe["saison"] . ' ' . $recipe["caloriesRecette"] . ' ">';
       }
    
  ?>
  <div class="work">
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/recipes/' . $recipe["linkImage"] . ');">
                 
                  </div>
                  <div style="height:150px; color:black;" class="d-flex flex-column align-items-start justify-content-center" >

                  
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;" class="mt-2 fw-800 ">' . $recipe['descriptionRecette'] . '</p>';
                 
                    ?>
  
                  </div>
                  </div>
                </div>
              </div>
  </a>
                <?php
  }

  public function displayOneRecipeNews($recipe)
  {
    ?>
 <?php
   echo '<a sstyle="position:relative; text-decoration:none; color:#fff;" href="recipeDetails.php/?id='.$recipe["idRecette"].'">';
   ?>
  <div  class="item">
                <div class="work">
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/recipes/' . $recipe["linkImage"] . ');">
                 
                  </div>
                  <div style="height:150px; color:black;" class="d-flex flex-column align-items-start justify-content-center" >

                  
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;" class="mt-2 fw-800 ">' . $recipe['descriptionRecette'] . '</p>';
                 
                    ?>
  
                  </div>
                  </div>
                </div>
              </div>
  </a>
                <?php
  }

  public function displayOneRecipeProfile($recipe,$page)
  {
    ?>
 <?php
   echo '<a sstyle="position:relative; text-decoration:none; color:#fff;" href="recipeDetails.php/?id='.$recipe["idRecette"].'">';
   ?>
  <div  class="item">
                <div class="work">
                  <div class="d-flex flex-column justify-content-center">
                  <?php
                  echo '<div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../pictures/recipes/' . $recipe["linkImage"] . ');">
                    <div class="text w-100">';
if($page=="fete"){
                    echo '<span class="cat">' . $recipe['feteRecette'] . '</span>';
}
                
                      echo '<span class="like">'.$recipe['titreRecette'].'</span>

                    </div>
                  </div>
                  <div style="height:150px; color:black;" class="d-flex flex-column align-items-start justify-content-center" >

                  
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;" class="mt-2 fw-800 ">' . $recipe['descriptionRecette'] . '</p>
                    <div class="d-flex align-items-center justify-content-start">';
                 
                    ?>
  
                    </div>
                  </div>
                  </div>
                </div>
              </div>
  </a>






                <?php
  }


  public function displayOneRecipeCategory($recipe)
  {
    ?>
   <?php
   echo '<a style="color:black;" href="../recipeDetails.php/?id='.$recipe["idRecette"].'">';
   ?>
    <?php
   echo '<div  class="item karim '.$recipe["saison"].' '.$recipe["caloriesRecette"].'  ">
                <div class="work work1">
                  <div class="d-flex flex-column justify-content-center">
                 
                 <div class="img d-flex align-items-start justify-content-center" style="background-image: url(../../../pictures/recipes/'.$recipe["linkImage"].');">
                    <div class="text w-100">
                    <span class="cat">'.$recipe['caloriesRecette'].'</span>
                      <span class="like"><i class="far fa-heart"></i>'.$recipe['titreRecette'].'</span>
                    </div>
                  </div>
                  <div  style="height:150px;" class="'.$recipe["saison"].'d-flex flex-column align-items-start justify-content-center" >

                  
                    <p style="  display: block;/* or inline-block */
                    text-overflow: ellipsis;
                    word-wrap: break-word;
                    overflow: hidden;
                    max-height: 3.6em;
                    line-height: 1.8em;"  class="mt-2 fw-800 ">'.$recipe['descriptionRecette'].'</p>
                    <div class="d-flex align-items-center justify-content-start">
                    <img src="../../../pictures/profile/'.$recipe["imageUtilisateur"].'" class="rounded-circle mr-3" style="width: 60px;"
                    alt="Avatar" />
                    <p>'.$recipe["nomUtilisateur"]. " ".$recipe["prenomUtilisateur"].'</p>

                    ';
                    ?>

                    </div>
                  </div>
                  </div>
                </div>
              </div>
  </a>
                <?php
  }

  public function displayRecipesCategoryHome($cat)
  {
    ?>
      <section class="ftco-section">
    
    <div class="container">
      <div class="row">
      <?php
      $this->showCategory($cat);
      ?>

          <div  class="col-md-12">
            <div  class="featured-carousel owl-carousel">
   <?php
       $controller=new myController();
       $table=$controller->getRecetteLimit($cat);
    foreach ($table as $row) {
      $this->displayOneRecipeHome($row);
    }
    ?>
    </div>
  </div>
      </div>
    </div>
      </section>
      

<?php
  }

  public function displayRecipesHealthy($seuilCalories)
  {
    ?>
      <section style="margin-top:140px;" class="ftco-section">
    
    <div class="container">
      <div class="row">
      <?php
      $this->showTitle("Healthy recipes");
      ?>

          <div class="col-md-12">
            <div style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr ; grid-gap:20px;">
   <?php
       $controller=new myController();
       $table=$controller->getRecettesHealthy();
    foreach ($table as $row) {
      $this->displayOneRecipe($row);
    }
    ?>
    </div>
  </div>
      </div>
    </div>
      </section>
      

<?php
  }

  public function displayRecipesSaison()
  {
    ?>
      <section style="margin-top:140px;" class="ftco-section">
    
    <div class="container">
      <div class="row">
      <?php
      $this->showTitle("Season recipes");
      ?>
          <ul style="margin-bottom:30px;" class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <button  class="nav-link " id="summerS" value="summer" >Summer</button>
                                </li>
                                <li class="nav-item">
                                <button   class="nav-link " id="winterS"  value="winter">Winter</button>
                                </li>
                                <li class="nav-item">
                                <button class="nav-link" id="springS"  value="spring">Spring</button>
                                </li>
                                <li class="nav-item">
                                <button class="nav-link " id="autumnS"  value="autumn">Autumn</button>
                                </li>
                              </ul>


          <div class="col-md-12">
            <div class="filterSeason" style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr ; grid-gap:20px;">
   <?php
       $controller=new myController();
       $table=$controller->getRecettesSaison();
    foreach ($table as $row) {
      $this->displayOneRecipeProfile($row,"");
    }
    ?>
    </div>
  </div>
      </div>
    </div>
      </section>
      <script src="../jqueryFilters/milo.js"></script>


<?php
  }

  public function displayRecipesFete()
  {
    ?>
      <section style="margin-top:140px;" class="ftco-section">
    
    <div class="container">
      <div class="row">
      <?php
      $this->showTitle("Fetes");
      ?>
          <ul style="margin-bottom:30px;" class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <button  class="nav-link " id="fitr" value="fitr" >Air el fitr</button>
                                </li>
                                <li class="nav-item">
                                <button   class="nav-link " id="adha"  value="adha">Aid el adha</button>
                                </li>
                                <li class="nav-item">
                                <button class="nav-link" id="yennayer"  value="yennayer">Yennayer</button>
                                </li>
                                <li class="nav-item">
                                <button class="nav-link " id="mawlid"  value="mawlid">Mawlid Nabawi</button
                                </li>
                                <li class="nav-item">
                                <button class="nav-link " id="marriage"  value="marriage">Marriage</button
                                </li>
                                <li class="nav-item">
                                <button class="nav-link " id="achoura"  value="achoura">Achoura</button
                                </li>
                              </ul>
                              <script src="../jqueryFilters/filterTest.js"></script>
          <div class="col-md-12">
            <div class="filterFete" style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr ; grid-gap:20px;">
   <?php
       $controller=new myController();
       $table=$controller->getRecettesFete();
    foreach ($table as $row) {
      $this->displayOneRecipeProfile($row,"fete");
    }
    ?>
    </div>
  </div>
      </div>
    </div>
      </section>
      <script src="../jqueryFilters/milo.js" ></script>

<?php
  }

  public function allRecipesOfCategory($cat){
    ?>
<section style="margin-top: 140px;" class="ftco-section one">

<div style=" box-sizing:border-box; padding:0 ;" >
<div >
<div class="col-md-12 text-start">
<?php
$cats=["","Entrees","Plats","Boissons","Desserts"];
        echo '<h2 style="margin-top:10px;" class="heading-section fw-bold ">'.$cats[$cat].'</h2>';
?>

</div>

<div style=" padding:1rem ;  box-sizing:border-box ;width:100% ;  display:flex ; justify-content:space-between;">
<form  method="POST" style=" padding:10px; left:1rem ;   width:16%; height:100%; border:1px solid lightgray">


  <div style="border-bottom:1px solid lightgray"  class="panel-heading"><h6 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Saisons</h6>
<ul >

      <div>
      <input id="summerF" type="checkbox" value="summer"  />
      <label for="summerF">Summer</label>
      </div>
      <div>
      <input id="winterF" type="checkbox" value="winter" />
      <label for="winterF">Winter</label>
      </div>
      <div>
      <input id="springF" type="checkbox" value="spring" />
      <label for="springF">Spring</label>
      </div>
      <div>
      <input id="autumnF" type="checkbox" value="autumn" />
      <label for="autumnF">Autumn</label>
      </div>
  

     
     </ul>
  </div>

  <div  class="panel-heading"><h6 style="margin-top:20px; font-size:15px;" class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Calories <span id="selectedCalories" ></span> </h6>
  <div>
<input  style="width:100%; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;"  type="range"  id="caloriesFilter" min="0" max="2000" value="0" step="200">

  </div>
  </div>

  <div  class="panel-heading"><h6 style="font-size:15px;margin-top:15px;" class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Cooking time <span id="selectedCookingTime"></span></h6>
  <div>
<input  style="width:100%; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;" type="range" id="cookingTimeFilter" name="cookingTimeFilter" value="0" min="0" max="240" step="20">

  </div>
  </div>

  <div  class="panel-heading"><h6 style="font-size:15px;margin-top:15px;" class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Preparation time <span id="selectedPreparationTime" ></span> </h6>
  <div>
<input  style="width:100%; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;"  type="range" id="preparationTimeFilter" name="preparationTimeFilter" value="0" min="0" max="240" step="20">
  </div>
  </div>


  <div  class="panel-heading"><h6 style="font-size:15px;margin-top:15px;" class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Rest time<span id="selectedRestTime" ></span> </h6>
  <div>
<input  style="width:100%; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;"  type="range" id="restTimeFilter" name="restTimeFilter" value="0" min="0" max="240" step="20">

  </div>
  </div>


  <div  class="panel-heading"><h6 style="font-size:15px;margin-top:15px;" class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Total time <span id="selectedTotalTime" ></span> </h6>
  <div>
<input  style="width:100%; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;"  type="range" id="totalTimeFilter" name="totalTimeFilter" value="0" min="0" max="240" step="20">

  </div>
  </div>


  <div  class="panel-heading"><h6 style="font-size:15px;margin-top:15px;" class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Notation<span id="selectedNotation" ></span> </h6>
  <div>
<input  style="width:100%; height:2px; background:#FC6A36;-webkit-appearance: none;color:red;cursor: pointer;"  type="range" id="notationFilter" name="notationFilter" min="0" value="0" max="5" step="1">

  </div>
  </div>

  <select 
                                        style="background-color:transparent;
                                        margin-right:20px;
                                        padding:3px 10px;
                                        "
                                         id="order">
    <option value="">Calories order</option>
    <option value="asc">Asc</option>
    <option value="desc">Desc</option>
</select>
           
<?php
        echo '<input style="margin:15px 0; color:#fff;font-weight: bold; background-color:#1c3f34;border:none;padding:4px 10px; width:100%; " type="submit" id="filterBtnTry" data-attr="' .$cat. '" value="get results" />';
?>
</form>

<div style="position:absolute ; right:1rem; width:80%;">
   <div  class="filterMeryem recipes-page">
<?php
  $controller=new myController();
       // echo $_POST["cookingTimeFilter"];
  $table=$controller->getRecette($cat);
foreach ($table as $row) {
 $this->displayOneRecipeCategory($row);
}

?>

<script type="text/javascript" src="../../jqueryFilters/categories.js">




</script>

</div>
</div>
</div>
</div>
</div>
</section>




<?php
  }

  public function categoryPage($id){
    ?>
    <body>
    <?php
           session_start();

    $this->navbarOneDetails();
    $this->navbarTwoDetails();
    $this->allRecipesOfCategory($id);
    ##$this->footer();
?>
    
    </body>
    <script src="../../../js/jquery.min.js"></script>
<script src="../../../js/popper.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="../../../js/main.js"></script>



</html>
 <?php

    
   }


  public function filterRecipes($cat)
  {
    ?>
      <section class="ftco-section one">
    
    <div class="container">
      <div class="row">
      <?php
      $this->showCategory($cat);
      ?>

          <div class="col-md-12">
            <div class="featured-carousel owl-carousel">
   <?php
   echo 'fff';
       $controller=new myController();
       $table=$controller->filter(1,"ete");
    foreach ($table as $row) {
      $this->displayOneRecipe($row);
    }
    ?>
    </div>
  </div>
      </div>
    </div>
      </section>
      

<?php
  }


  public function contactPage()
  {
    ?>
        <body>
        <?php
        $this->navbarOne();
        $this->navbarTwo();
        ?>

<div style="margin-top:170px;" class="container">

  <form target="_blank" >

    <div class="form-group">

      <div class="form-row">

        <div class="col">

          <input type="text" name="name" class="form-control" placeholder="Username" required>

        </div>

        <div class="col">

          <input type="email" name="email" class="form-control" placeholder="Email" required>

        </div>

      </div>

    </div>

    <div class="form-group">

      <textarea placeholder="Write anything" class="form-control" name="message" rows="10" required></textarea>

    </div>

    <button type="submit" class="btn btn-lg btn-dark btn-block">Send</button>

  </form>

</div>


        
    <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/owl.carousel.min.js"></script>
        <script src="../../js/main.js"></script>
        <script src="../../profile.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


              <?php

  }



  public function profilePage()
  {
    ?>
        <body>
        <?php
        $this->navbarOne();
        $this->navbarTwo();
        $controller=new myController();
        session_start();

       $table=$controller->getUser($_SESSION['currentUser']);
        foreach ($table as $row) {
          echo '
          <div  class="page-header header-filter" data-parallax="true" style="margin-top:-150px; background-image:url("http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png");"></div>
          

          <div style="margin-bottom:30px;margin-top: -300px;" class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                           <div style="display: flex;flex-direction:column; margin-top: -50px; align-items: center; justify-content: center;" class="profile">
                                <div style="height: 180px; width: 180px;" class="avatar">
                                    <img src="../../pictures/profile/' . $row["imageUtilisateur"] . '" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                </div>
                                <div  class="name">
                                    <h3 style="font-size: 1.3rem;" class="title">'. $row["nomUtilisateur"] . ' ' . $row["prenomUtilisateur"] . '</h3>
                                    <a href="addRecipe.php" class="title" style="padding:8px 20px; font-weight:600;border:1px solid lightgray;" >Add recipe</a>

                                    </div>

                            </div>
                        </div>
                    </div>

                    <div style="margin-top:40px;" class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile-tabs">
                              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                        <i class="far fa-regular fa-user"></i>
       my recipes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                        <i class="far fa-heart"></i>
                                        favourite
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                        <i class="far fa-regular fa-bookmark"></i>                                    
                                            saved
                                    </a>
                                </li>
                              </ul>
                            </div>
                    </div>
                </div>
            
              <div class="tab-content tab-space">
                <div class="tab-pane active text-center gallery" id="studio">
                      <div style="height:fit-content; display:grid;grid-template-columns:1fr 1fr 1fr 1fr; grid-gap:20px;" class="row">
                      ';
                      $mesRecette=$controller->getUserRecette($_SESSION['currentUser']);
          foreach ($mesRecette as $recette) {
            $this->displayOneRecipeProfile($recette,"");
          }                  
          echo '
          </div>
                  </div>
                <div class="tab-pane text-center gallery" id="works">
                      <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr; grid-gap:20px;" class="row">';
                      $mesRecettePreferees=$controller->getUserFavoriteRecette($_SESSION['currentUser']);
                      foreach ($mesRecettePreferees as $recetteP) {
                        $this->displayOneRecipeProfile($recetteP,"");
                      }
                      echo '</div>
                  </div>
                <div class="tab-pane text-center gallery" id="favorite">
                      <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr; grid-gap:20px;" class="row">';
                      $mesRecetteSaved=$controller->getUserSavedRecette($_SESSION['currentUser']);
                      foreach ($mesRecetteSaved as $recetteS) {
                       $this->displayOneRecipeProfile($recetteS,"");
                      }  
                     echo'</div>
                  </div>
              </div>
          ';
        }

        
   /*     echo '
        <div style="width:100vw; margin-left:-8.4%; margin-bottom:-50px; box-sizing:border-box;  ">
        ';
        $this->footer();

echo'        </div>
        ';
*/
        

        ?>
    <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/owl.carousel.min.js"></script>
        <script src="../../js/main.js"></script>
        <script src="../../profile.js"></script>

              <?php

  }
}
?>
            

