<?php
    require_once('view.php');
    require_once('model.php');

    class myController{
      public function login(){
        $email = $_POST["emailUtilisateur"];
        $password = $_POST["motDePasseUtilisateur"];
            $model= new myModel();
        $users = $model->login($email,$password);
          foreach($users as $user) {
                if(($user['emailUtilisateur'] == $email) &&
                    ($user['motDePasseUtilisateur'] == $password)) {
                      session_start();
                      $_SESSION['currentUser'] = $user['idUtilisateur'];
                      if($user['admin']==0){
                        header("Location: homeAuth.php");
                      }
                      else{
                        header("Location: ../../admin/pages/recipesPage.php");

                      }
            
          }
                            
            }
              }

                  public function register(){
                    $nomUtilisateur =$_POST["nomUtilisateur"];
                    $prenomUtilisateur =$_POST["prenomUtilisateur"];
                    $emailUtilisateur = $_POST["emailUtilisateur"];
                    $motDePasseUtilisateur =$_POST["motDePasseUtilisateur"];
                    $bdUtilisateur =$_POST["bdUtilisateur"];
                    $sexeUtilisateur =$_POST["sexeUtilisateur"]; 

//picture
$target_dir = "../../pictures/profile/";
$target_file = $target_dir . basename($_FILES["imageUtilisateur"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));




move_uploaded_file($_FILES["imageUtilisateur"]["tmp_name"], $target_file);


                      $model= new myModel();
                     $model->register($prenomUtilisateur,$nomUtilisateur,$emailUtilisateur,$motDePasseUtilisateur,$bdUtilisateur,$sexeUtilisateur,$_FILES["imageUtilisateur"]["name"]);
                     $table = $model->getNextIdUser();
                     session_start();
    foreach ($table as $user) {
      $_SESSION['currentUser'] = $user['idUtilisateur'];
    }
                      header("Location: homeAuth.php");
                           }


  public function addIngredient()
  {
    foreach($_POST['healthy'] as $value) {
      $healthyIngredient=$value;
    }   
    foreach($_POST['season'] as $value) {
      $seasonIngredient=$value;
    }
    if($seasonIngredient!="summer" || $seasonIngredient!="winter" || $seasonIngredient!="spring" || $seasonIngredient!="autumn"){
      $seasonIngredient = "";
    }


    
    $model= new myModel();

    $target_dir = "../../pictures/ingredients/";
      $target_file = $target_dir . basename($_FILES["ingImage"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif" && $imageFileType != "avif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
      move_uploaded_file($_FILES["ingImage"]["tmp_name"], $target_file);
      }

    $model->addIngredient($_POST['nomIngredientAdmin'],$_POST['caloriesIngredientAdmin'],$healthyIngredient,$seasonIngredient,$_FILES["ingImage"]["name"]);
    $table = $model->getNextIdIngredient();
    foreach ($table as $row) {
      echo $row["idIngredient"];
      $idIngredient = $row["idIngredient"];
    }
    $i = 0;
    foreach ($_POST["nutritionsContainer"] as $value) {
      $table=$model->getNutrition($value);
      foreach ($table as $row) {
        $model->addNutritionIngredient($idIngredient,$row["idNutrition"],  $_POST["quantity"][$i]);
        $i = $i + 1;
      }
    }

    header("Location: ../pages/ingredientsPage.php");
  }    
  
  
  public function addDiapo()
  {
    $model= new myModel();
    foreach ($_POST['news'] as $value) {
      $diapo=$value;
    }
    foreach($_POST['diapo'] as $value) {
      $diapo=$value;
    }
    $target_dir = "../../pictures/diapos/";
   

    


      if ($diapo == 1) {
        $image =$_FILES["myImage1"] ;
        foreach ($_POST['recipes'] as $value) {
          $recipe = $value;
        }
        $model->addDiapoRecette($recipe,$image["name"]);
      } else {
        $image =$_FILES["myImage2"] ;
        foreach ($_POST['news'] as $value) {
          $news = $value;
        }
        if ($diapo == 0) {
          $model->addDiapoNews($news, $image["name"]);
        }
      }

    echo $image["name"];
      
      $target_file = $target_dir . basename($image["name"]);
      $uploadOk = 1;
      
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        move_uploaded_file($image["tmp_name"], $target_file);
      }

   
      header("Location: ../pages/adminDiapoPage.php");


  }

  public function addNews($titreNews,$descriptionNews)
  {
    $model= new myModel();
    $target_dir_video = "../../videos/";
$target_video = $target_dir_video . basename($_FILES["videoNews"]["name"]);
    move_uploaded_file($_FILES["videoNews"]["tmp_name"], $target_video);
    $model->addNews($titreNews,$descriptionNews,$_FILES["videoNews"]["name"]);
    $table= $model->getNextIdNews();
    foreach ($table as $row) {
      $count=$row["idNews"];
    }
   echo $count;
    $target_dir = "../../pictures/news/";
$target_file = $target_dir . basename($_FILES["imageNews"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["imageNews"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["imageNews"]["name"])). " has been uploaded.";

    $model->addNewsImage($count,$_FILES["imageNews"]["name"]);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

header("Location: ../pages/adminNewsPageMain.php");

  }

  public function addRecipe()
  {
    session_start();
    $model = new myModel();
    $error_message = "";
    $valid = 1;
    if (empty($_POST['titreRecetteAdmin'])) {
      $valid = 0;
      $error_message .= "title can not be empty<br>";
    }
    if (empty($_POST['descriptionRecetteAdmin'])) {
      $valid = 0;
      $error_message .= "description can not be empty<br>";
    }
    if (empty($_POST['caloriesRecetteAdmin'])) {
      $valid = 0;
      $error_message = "You must insert calories<br>";
    }


    if (empty($_POST['totalTimeMin']))  {
      $totalTimeMin = 0;
    }
    if (empty($_POST['totalTimeHour']))  {
      $totalTimeHour = 0;
    }

    if (empty($_POST['restTimeMin']))  {
      $restTimeMin = 0;
    }
    if (empty($_POST['restTimeHour']))  {
      $restTimeHour = 0;
    }

    if (empty($_POST['preparationTimeMin']) ) {
      $preparationTimeMin = 0;
    }
    if (empty($_POST['preparationTimeHour']) ) {
      $preparationTimeHour = 0;
    }

    if (empty($_POST['cookingTimeMin']))  {
      $cookingTimeMin = 0;
    }
    if (empty($_POST['cookingTimeHour']))  {
      $cookingTimeHour= 0;
    }

    if (empty($_POST['difficulteRecette'])) {
      $valid = 0;
      $error_message .= "cooking time can not be empty<br>";
    }

    foreach($_POST['saisonRecette'] as $value) {
      $saisonRecette=$value;

    }

    if($saisonRecette!="summer" || $saisonRecette!="winter" || $saisonRecette!="spring" || $saisonRecette!="autumn"){
      $saisonRecette = "";
    }

    foreach($_POST['categorieRecette'] as $value) {
      $categorieRecette=$value;

    }

    foreach($_POST['healthy'] as $value) {
      $healthyRecette=$value;

    }

    foreach($_POST['news'] as $value) {
      $newsRecette=$value;

    }

    foreach($_POST['fetes'] as $value) {
      $fetesRecette=$value;

    }

    if($fetesRecette=="party"){
      $fetesRecette = "";
    }
    
    $tempsPreparation=$preparationTimeMin+$preparationTimeHour*60;
    $tempsCuisson=$cookingTimeMin+$cookingTimeHour*60;
    $tempsRepos=$restTimeMin+$restTimeHour*60;
    $tempsTotal=$totalTimeMin+$totalTimeHour*60;
    
 

    
      echo "hihi";
      $model->addRecipe($_POST['titreRecetteAdmin'],$_POST['descriptionRecetteAdmin'],$tempsPreparation,$tempsCuisson,$tempsRepos,$tempsTotal,$healthyRecette,$_POST['caloriesRecetteAdmin'],1,$categorieRecette,$saisonRecette,$newsRecette,$fetesRecette,$_POST['difficulteRecette']);
      echo "okey";
      $table = $model->getNextIdRecipe();
      foreach ($table as $row) {
        echo $row["idRecette"];
        $idRecette = $row["idRecette"];
      }
      $target_dir = "../../pictures/recipes/";
      $target_dir_video = "../../videos/";
      $target_file = $target_dir . basename($_FILES["imageRecette"]["name"]);
      $target_video = $target_dir_video . basename($_FILES["videoRecette"]["name"]);
      move_uploaded_file($_FILES["videoRecette"]["tmp_name"], $target_video);  
      $model->addVideoRecipe($_FILES["videoRecette"]["name"], $idRecette);
   
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["imageRecette"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif" && $imageFileType != "avif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["imageRecette"]["tmp_name"], $target_file)) {
          echo "The file " . htmlspecialchars(basename($_FILES["imageRecette"]["name"])) . " has been uploaded.";
        
          $model->addImageRecipe($_FILES["imageRecette"]["name"], $idRecette, 0);
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      $countSteps = 1;
      foreach ($_POST["stepsContainer"] as $value) {
        $model->addEtapeRecipe($idRecette, $value, $countSteps);
        $countSteps++;
      }
      $i = 0;
      foreach ($_POST["ingredientsContainer"] as $value) {
        $table=$model->getIngredient($value);
        foreach ($table as $row) {
          $model->addIngredientRecipe($row["idIngredient"], $idRecette, $_POST["quantity"][$i]);
          $i = $i + 1;
        }
      }
   
      header("Location: ../pages/recipesPage.php");

  }

  public function addRecipeUser()
  {
    session_start();
    $model = new myModel();
    $error_message = "";
    echo $_SESSION['currentUser'];

    $valid = 1;
    if (empty($_POST['titreRecetteAdmin'])) {
      $valid = 0;
      $error_message .= "title can not be empty<br>";
    }
    if (empty($_POST['descriptionRecetteAdmin'])) {
      $valid = 0;
      $error_message .= "description can not be empty<br>";
    }
    if (empty($_POST['caloriesRecetteAdmin'])) {
      $valid = 0;
      $error_message = "You must insert calories<br>";
    }

    if (empty($_POST['totalTimeMin']))  {
      $totalTimeMin = 0;
    }
    if (empty($_POST['totalTimeHour']))  {
      $totalTimeHour = 0;
    }

    if (empty($_POST['restTimeMin']))  {
      $restTimeMin = 0;
    }
    if (empty($_POST['restTimeHour']))  {
      $restTimeHour = 0;
    }

    if (empty($_POST['preparationTimeMin']) ) {
      $preparationTimeMin = 0;
    }
    if (empty($_POST['preparationTimeHour']) ) {
      $preparationTimeHour = 0;
    }

    if (empty($_POST['cookingTimeMin']))  {
      $cookingTimeMin = 0;
    }
    if (empty($_POST['cookingTimeHour']))  {
      $cookingTimeHour= 0;
    }
    if (empty($_POST['difficulteRecette'])) {
      $valid = 0;
      $error_message .= "cooking time can not be empty<br>";
    }

    foreach($_POST['saisonRecette'] as $value) {
      $saisonRecette=$value;

    }


    foreach($_POST['categorieRecette'] as $value) {
      $categorieRecette=$value;

    }

    foreach($_POST['healthy'] as $value) {
      $healthyRecette=$value;

    }

    foreach($_POST['fetes'] as $value) {
      $fetesRecette=$value;

    }

    if($saisonRecette!="summer" || $saisonRecette!="winter" || $saisonRecette!="spring" || $saisonRecette!="autumn"){
      $saisonRecette = "";
    }

    if($fetesRecette!="yennayer" || $fetesRecette!="adha" || $fetesRecette!="fitr" || $fetesRecette!="mawlid" || $fetesRecette!="marriage" || $fetesRecette!="achoura"){
      $fetesRecette = "";
    }

    $tempsPreparation=$preparationTimeMin+$preparationTimeHour*60;
    $tempsCuisson=$cookingTimeMin+$cookingTimeHour*60;
    $tempsRepos=$restTimeMin+$restTimeHour*60;
    $tempsTotal=$totalTimeMin+$totalTimeHour*60;


    
  
      $model->addRecipeUser($_POST['titreRecetteAdmin'],$_POST['descriptionRecetteAdmin'],$tempsPreparation,$tempsCuisson,$tempsRepos,$tempsTotal,$healthyRecette,$_POST['caloriesRecetteAdmin'],$_SESSION['currentUser'],$categorieRecette,$saisonRecette,$fetesRecette,$_POST['difficulteRecette']);
      $table = $model->getNextIdRecipe();
      foreach ($table as $row) {
        echo $row["idRecette"];
        $idRecette = $row["idRecette"];
      }
      $target_dir = "../../pictures/recipes/";
      $target_dir_video = "../../videos/";
      $target_file = $target_dir . basename($_FILES["imageRecette"]["name"]);
      $target_video = $target_dir_video . basename($_FILES["videoRecette"]["name"]);
      move_uploaded_file($_FILES["videoRecette"]["tmp_name"], $target_video);     
      $model->addVideoRecipe($_FILES["videoRecette"]["name"], $idRecette);

      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    


      // Allow certain file formats
 

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["imageRecette"]["tmp_name"], $target_file)) {
          echo "The file " . htmlspecialchars(basename($_FILES["imageRecette"]["name"])) . " has been uploaded.";
        
          $model->addImageRecipe($_FILES["imageRecette"]["name"], $idRecette, 0);
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      $countSteps = 1;
      foreach ($_POST["stepsContainer"] as $value) {
        $model->addEtapeRecipe($idRecette, $value, $countSteps);
        $countSteps++;
      }
      $i = 0;
      foreach ($_POST["ingredientsContainer"] as $value) {
        $table=$model->getIngredient($value);
        foreach ($table as $row) {
          $model->addIngredientRecipe($row["idIngredient"], $idRecette, $_POST["quantity"][$i]);
          $i = $i + 1;
        }
      }
    
    header("Location: ../../user/actions/profilePage.php");

  }

                            public function logout()
                            {
    session_start();
    session_destroy();
    header("Location: ./homeAuth.php");

                            }  

             

                            public function noteRecipe($id,$note){
                              $model = new myModel();
    echo "fuckkkk";
                              $notes = $model->getNotes($id);
                              foreach($notes as $note){
                                $counter = $note["compter"];
                              }
    $currentNote = $model->getNote($id);
    foreach($currentNote as $n){
      $notation = $n["notation"];
    }
    $currentSum = $counter * $notation;
    $model->noteRecipe($id,$_SESSION['currentUser'], $note);
    $newNote = ($currentSum + $note) / ($counter + 1);
    $model->updateNoteRecipe($id, $newNote);
  
                            }

                    public function updateRecipeAdmin($id){
                      $model = new myModel();

                      foreach($_POST['saisonRecette'] as $value) {
                        $saisonRecette=$value;
                  
                      }
                  
                      foreach($_POST['categorieRecette'] as $value) {
                        $categorieRecette=$value;
                  
                      }
                  
                      foreach($_POST['healthy'] as $value) {
                        $healthyRecette=$value;
                  
                      }

                      foreach($_POST['valide'] as $value) {
                        $valideRecette=$value;
                  
                      }
                  
                      foreach($_POST['news'] as $value) {
                        $newsRecette=$value;
                  
                      }
                  
                      foreach($_POST['fetes'] as $value) {
                        $fetesRecette=$value;
                  
                      }

    $model->updateRecipe($_POST['titreRecetteAdmin'],$_POST['descriptionRecetteAdmin'],$categorieRecette,$saisonRecette,$newsRecette,$fetesRecette,$healthyRecette,$valideRecette,$id);

    header("Location: ../pages/recipesPage.php");
    
                      }


                      public function updateNews($id){
                        $model = new myModel();
  
                    
  
      $model->updateNews($_POST['titreNewsAdmin'],$_POST['descriptionNewsAdmin'],$id);
  
      header("Location: ../pages/adminNewsPageMain.php");
      
                        }
  
                        public function updateIngredient($id){
                          $model = new myModel();
    
                      
    
        $model->updateIngredient($_POST['titreNewsAdmin'],$_POST['descriptionNewsAdmin'],$id);
    
        header("Location: ../pages/ingredientsPage.php");
        
                          }
                    
                    

                          public function getNews()
                          {
                            $model = new myModel();
                            $recipes=$model->getNews();
                            return $recipes;
                          }
                          public function getDiaposRecette()
                          {
                            $model = new myModel();
                            $recipes=$model->getDiaposRecette();
                            return $recipes;
                          }
                          public function getDiaposNews()
                          {
                            $model = new myModel();
                            $recipes=$model->getDiaposNews();
                            return $recipes;
                          }
                          public function getNewsRecipes()
                          {
                            $model = new myModel();
                            $recipes=$model->getNewsRecipes();
                            return $recipes;
                          } 
                          public function getAllUsers()
                          {
                            $model = new myModel();
                            $users=$model->getAllUsers();
                            return $users;
                          }  
                          public function getSexeUsers($sexe)
                          {
                            $model = new myModel();
                            $users=$model->getSexeUsers($sexe);
                            return $users;
                          }   

                          public function getUsersOrderDesc()
                          {
                            $model = new myModel();
                            $users=$model->getUsersOrderDesc();
                            return $users;
                          }   

                          public function getUsersOrderAsc()
                          {
                            $model = new myModel();
                            $users=$model->getUsersOrderAsc();
                            return $users;
                          }   
                          public function getAllRecipes()
                          {
                            $model = new myModel();
                            $recipes=$model->getAllRecipes();
                            return $recipes;
                          }  
                          
                          public function getAllNews()
                          {
                            $model = new myModel();
                            $recipes=$model->getAllNews();
                            return $recipes;
                          }  
                          public function getAllIngredients()
                          {
                            $model = new myModel();
                            $ingredients=$model->getAllIngredients();
                            return $ingredients;
                          }    

                          public function getAllNutritions()
                          {
                            $model = new myModel();
                            $nutritions=$model->getAllNutritions();
                            return $nutritions;
                          }   
                        public function getRecette($category)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecettes($category);
                          return $recipes;
                        }  
                        public function getRecetteLimit($category)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecettesLimit($category);
                          return $recipes;
                        }  
                        public function getRecettesHealthy()
                        {
                          $model = new myModel();
  

                          $recipes=$model->getRecettesHealthy();
                          return $recipes;
                        }  

                        public function getRecettesSaison()
                        {
                          $model = new myModel();
  
                          $recipes=$model->getRecettesSaison();
                          return $recipes;
                        }  

                        public function getRecettesSaisonSpecific($saison)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecettesSaisonSpecific($saison);
                          return $recipes;
                        }  

                        public function getRecettesSaisonSpecificAdmin($saison)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecettesSaisonSpecificAdmin($saison);
                          return $recipes;
                        }  


                        public function getRecettesFete()
                        {
                          $model = new myModel();
                          $recipes=$model->getRecettesFete();
                          return $recipes;
                        }  

                        public function getRecettesFeteSpecific($fete)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecettesFeteSpecific($fete);
                          return $recipes;
                        }  

                        public function getRecettesNutritionSpecific($item)
                        {
                          $model = new myModel();
    $n = $model->getNutrition($item);
    foreach($n as $e)
    {
      $id = $e["idNutrition"];
    }
                          $recipes=$model->getRecettesNutritionSpecific($id);

                          return $recipes;
                        }  


                        

                        public function getUserRecette($user)
                        {
                          $model = new myModel();
                          $recipes=$model->getUserRecettes($user);
                          return $recipes;
                        }  

                        public function getUserFavoriteRecette($user)
                        {
                          $model = new myModel();
                          $recipes=$model->getUserFavoriteRecettes($user);
                          return $recipes;
                        }  

                        public function getUserSavedRecette($user)
                        {
                          $model = new myModel();
                          $recipes=$model->getUserSavedRecettes($user);
                          return $recipes;
                        }  

                        public function getAdminRecipe($id)
                        {
                          $model = new myModel();
                          $recipes=$model->getAdminRecipe($id);
                          return $recipes;
                        }  

                        public function updateRecipePage($id)
                        {
                          $view = new view();
                          $view->adminHead();
                          $view->displayUpdateRecipe($id);


                          //header("Location: ../../pages/recipesPage.php");
                        }  
                        
                        public function updateNewsPage($id)
                        {
                          $view = new view();
                          $view->adminHead();
                          $view->displayUpdateNews($id);


                          //header("Location: ../../pages/recipesPage.php");
                        }  
                        
                        
                        public function adminOneProfilePage($id)
                        {
                          $view = new view();
                          $view->adminHead();
                          $view->adminOneProfilePage($id);
                        }  

                        public function displayAdminDiaporamaPage()
                        {
                          $view = new view();
                          $view->adminHead();
                          $view->displayAdminDiaporamaPage();


                          //header("Location: ../../pages/recipesPage.php");
                        }  
                        
                        public function deleteRecipe($id)
                        {
                          $model = new myModel();
                          $model->deleteRecipe($id);


                          header("Location: ../../pages/recipesPage.php");
                        }  
                        
                        
                        public function deleteRecipeDiapo($id)
                        {
                          $model = new myModel();
                          $model->deleteRecipeDiapo($id);


                          header("Location: ../../pages/adminDiapoPage.php");
                        } 

                        public function deleteNewsDiapo($id)
                        {
                          $model = new myModel();
                          $model->deleteNewsDiapo($id);


                          header("Location: ../../pages/adminDiapoPage.php");
                        } 

public function deleteIngredient($id){
  $model = new myModel();
  $model->deleteIngredient($id);


  header("Location: ../pages/ingredientsPage.php");
}

                        public function deleteNews($id)
                        {
                          $model = new myModel();
                          $model->deleteNews($id);


                          header("Location: ../../pages/adminNewsPageMain.php");
                        } 

                        public function validateRecipe($id)
                        {
                          $model = new myModel();
                          $model->validateRecipe($id);
                          header("Location: ../pages/recipesPage.php");
                        }  

                        public function validateUser($id)
                        {
                          $model = new myModel();
                          $model->validateUser($id);
                          header("Location: ../pages/usersPage.php");
                        }  

                        public function blockUser($id)
                        {
                          $model = new myModel();
                          $model->blockUser($id);
                          header("Location: ../../pages/usersPage.php");
                        }  

                        public function unblockUser($id)
                        {
                          $model = new myModel();
                          $model->unblockUser($id);
                          header("Location: ../../pages/usersPage.php");
                        }  
                    

                        public function getCategories()
                        {
                          $model = new myModel();
                          $recipes=$model->getCategories();
                          return $recipes;
                        } 
                        public function getRecipeSteps($id)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecipeSteps($id);
                          return $recipes;
                        } 

                        public function getRecipeIngredients($id)
                        {
                          $model = new myModel();
                          $recipes=$model->getRecipeIngredients($id);
                          return $recipes;
                        } 

                        public function getSearchRecipes()
                        {
                          $model = new myModel();
                          $recipes = $model->getAllRecipesNoUser();    
                          $b=[];
    $resultRecipes = [];
    $countb = 0;
                          foreach ($_POST['ingredients'] as $row) {
      $idIng = $model->getIngredient($row);
      foreach ($idIng as $row1) {
        array_push($b, $row1["idIngredient"]);
        $countb = $countb + 1;
      }
                          }
    //echo $countb;
    foreach ($recipes as $row) {
      $recipeIngs=$model->getRecipeIngredientsSearch($row["idRecette"]);
      $a = [];
      foreach ($recipeIngs as $value) {
          array_push($a, $value["idIngredient"]);
           }
      $result=array_intersect($b,$a) ;
      $countresult = 0;
      foreach($result as $r)
      {
        $countresult = $countresult + 1;
      //  echo "mili ";
      }
      $arrLength = count($result) ;
      $count = $countresult/$countb*100 ;
      //echo $countresult;
      if($count>=70){
        $god = $model->getOneRecette($row["idRecette"]);
       foreach($god as $g)
       {
          $final= $g;
       }

        array_push($resultRecipes, $final);
      }
     }
     return $resultRecipes;
                        } 





                        public function getSaisons()
                        {
                          $model = new myModel();
                          $recipes=$model->getSaisons();
                          return $recipes;
                        }

                        public function filter($cat,$saison,$cookingTime,$preparationTime,$restTime,$totalTime,$calories,$notation,$order)
                        {
                          $model = new myModel();
                          $recipes=$model->filter($cat,$saison,$cookingTime,$preparationTime,$restTime,$totalTime,$calories,$notation,$order);
                          return $recipes;
                        } 
                        

                        public function filterUsersAdmin($sex,$order)
                        {
                          $model = new myModel();
                          $recipes=$model->filterUsersAdmin($sex,$order);
                          return $recipes;
                        } 

                        public function getOneRecette($category)
                        {
                          $model = new myModel();
    
                          $recipes=$model->getOneRecette($category);
                          return $recipes;
                        }  

                        public function getOneIngredientNutrition($id)
                        {
                          $model = new myModel();
                          $recipes=$model->getOneIngredientNutrition($id);
                          return $recipes;
                        }  

                        
                        public function getOneNews($news)
                        {
                          $model = new myModel();
                          $news=$model->getOneNews($news);
                          return $news;
                        }  
                        public function getOneNewsImages($news)
                        {
                          $model = new myModel();
                          $images=$model->getOneNewsImages($news);
                          return $images;
                        } 

                        public function getUser($user)
                        {
                          $model = new myModel();
    
                          $recipes=$model->getUser($user);
                          return $recipes;
                        }  

                      

                      public function displayHomePage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayHomePage();
                      }

                      public function displayRecipeIdeasPageResult($data)
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayRecipeIdeasPageResult($data);
                      }

                      public function displayRecipeIdeasPage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayRecipeIdeasPage();
                      }

                      public function displayAdminAddIngredientPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminAddIngredientPage();
                      }

                      public function adminUpdateIngredientPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminUpdateIngredientPage();
                      }

                      public function displayAdminNewsMainPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminNewsPageMain();
                      }

                      public function displayAdminDiapoPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminDiapoPage();
                      }

                      

                      public function displayAdminRecipesPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminRecipesPage();
                      }
                      public function displayAdminIngredientsPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminIngredientsPage();
                      }
                      public function displayAdminUsersPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminUsersPage();
                      }
                      public function displayAdminCreateRecipePage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminCreateRecipePage();
                      }
                      public function displayAdminNewsPage()
                      {
                        $view=new view();
                        $view->adminHead();
                        $view->adminNewsPage();
                      }
                      public function displayHealthyPage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayHealthyPage();
                      }

                      public function displaySaisonPage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displaySaisonPage();
                      }
                      public function displayFetePage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayFetePage();
                      }
                      public function displayNewsPage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayNewsPage();
                      }

                      public function likeRecipe($id){
                        $model = new myModel();
                        session_start();
                        $images=$model->likeRecipe($_SESSION['currentUser'],$id);
                        header("Location: homeAuth.php");
                        return $images;
                      }

                      public function getIngredientsNutrition(){
                        $model = new myModel();
                        $images=$model->getIngredientsNutrition();
                        return $images;
                      }
                      
                      public function displayNutritionPage()
                      {
                        $view=new view();
                        $view->myHead();
                        $view->displayNutritionPage();
                      }
                      
                      public function displayCategoryPage($id)
                      {
                        $view=new view();
                        $view->myHeadCategory();
                        $view->categoryPage($id);
                      }
                      public function displayLoginPage()
                      {
                        $view=new view(); 
                        $view->loginHead();
                        $view->loginPage();
                      }
                      public function displayRegisterPage()
                      {
                        $view=new view(); 
                        $view->loginHead();
                        $view->registerPage();
                      }
                      public function displayRecipeDetailsPage($id)
                      {
                        $view=new view(); 
                        $view->recipeDetailsHead();
                        $view->recipeDetailsPage($id);
                      }

                      public function displayNewsDetailsPage($id)
                      {
                        $view=new view(); 
                        $view->recipeDetailsHead();
                        $view->newsDetailsPage($id);
                      }

                      public function displayProfilePage()
                      {
                        $view=new view(); 
                        $view->profileHead();
                        $view->profilePage();
                      }

                      public function displayContactPage()
                      {
                        $view=new view(); 
                        $view->profileHead();
                        $view->contactPage();
                      }


                      public function displayAddRecipePage()
                      {
                        $view=new view(); 
                        $view->addRecipeHead();
                        $view->addRecipeForm();
                      }
                      public function showadmin()
                      {
                        $view=new view();
                        $view->displayAdminhead();
                        $view->displayAdminpage();
                      }
                      public function showUser()
                      {
                        $view=new view();
                        $view->displayUserhead();
                        $view->displayUserpage();
                      }
    }
?>