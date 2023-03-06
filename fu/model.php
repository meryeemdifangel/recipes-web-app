<?php
    class myModel{
        private $dbname="foodapp";
        private $host="localhost";
        private $user="root";
        private $password="";
        private $port="3307";

 public function connexion($dbname,$host,$port,$user,$password){
    $dsn="mysql:host=$host;port=$port;dbname=$dbname;charset=utf8;";
        

    try{
        $conn=new PDO($dsn,$user,$password);

        }
        catch(PDOException $ex){
        printf("erreur de connexion à la base de donnée", $ex->getMessage());
        exit();
        }

        return $conn;   
 }
 private function deconnexion($conn){
    $conn=null;
 }
 private function requete($conn,$r){
        echo 'requete';
  echo $conn->query($r);
  return $conn->query($r);
 }
 public function register($prenomUtilisateur ,$nomUtilisateur,$emailUtilisateur,$motDePasseUtilisateur,$bdUtilisateur,$sexeUtilisateur,$imageUtilisateur){
    $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
    $stmt = $conn->prepare( 'INSERT INTO  utilisateur ( prenomUtilisateur,nomUtilisateur, emailUtilisateur, motDePasseUtilisateur , bdUtilisateur , sexUtilisateur , imageUtilisateur ) VALUES (?,?,?,?,?,?,?)');
         $stmt->execute([$prenomUtilisateur,$nomUtilisateur,$emailUtilisateur,$motDePasseUtilisateur,$bdUtilisateur,$sexeUtilisateur,$imageUtilisateur]);
         $this->deconnexion($conn);
         return $user =$stmt->fetchAll(); 
 }
 public function addNews($titreNews, $descriptionNews,$linkVideo){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'INSERT INTO  newstable ( titreNews, descriptionNews,idVideo) VALUES (?,?,?)');
        $stmt->execute([$titreNews, $descriptionNews,$linkVideo]);
        $this->deconnexion($conn);
}

public function addDiapoRecette($linkImage, $imageDiapo){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'INSERT INTO  diaporamarecette ( linkImage, imageDiapo) VALUES (?,?)');
        $stmt->execute([$linkImage, $imageDiapo]);
        $this->deconnexion($conn);
}

public function addDiapoNews($linkImage, $imageDiapo){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'INSERT INTO  diaporamanews ( linkImage, imageDiapo) VALUES (?,?)');
        $stmt->execute([$linkImage, $imageDiapo]);
        $this->deconnexion($conn);
}


public function noteRecipe($id,$user,$note){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   
   $stmt = $conn->prepare( 'INSERT INTO  noterecette ( idUtilisateur, idRecette , note) VALUES (?,?,?)');
   $stmt->execute([$user, $id , $note]);

        $this->deconnexion($conn);
}

public function getNotes($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   
   $stmt = $conn->prepare( 'select count(note) as compter from noterecette where idRecette=?');
   $stmt->execute([$id]);
        $this->deconnexion($conn);
        return $notes=$stmt->fetchAll();

}
public function getNote($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   
   $stmt = $conn->prepare( 'select notation from recette where idRecette=?');
   $stmt->execute([$id]);
        $this->deconnexion($conn);
        return $notes=$stmt->fetchAll();

}

public function updateNoteRecipe($id,$note){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE recette SET notation = ? WHERE idRecette=?');
        $stmt->execute([$note , $id]);
        $this->deconnexion($conn);
}



public function updateRecipe($titreRecette ,$descriptionRecette,$idCategorie,$saison,$newsRecette,$feteRecette,$healthyRecette,$valideRecette,$id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE recette SET titreRecette = ? , descriptionRecette=? , idCategorie=? , saison=? , newsRecette=? , feteRecette=? , healthyRecette=? , valideRecette=? WHERE idRecette=?');
        $stmt->execute([$titreRecette ,$descriptionRecette,$idCategorie,$saison,$newsRecette,$feteRecette,$healthyRecette,$valideRecette , $id]);
        $this->deconnexion($conn);
}

public function updateNews($titreRecette ,$descriptionRecette,$id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE newstable SET titreNews = ? , descriptionNews=?  WHERE idNews=?');
        $stmt->execute([$titreRecette ,$descriptionRecette,$id]);
        $this->deconnexion($conn);
}

public function updateIngredient($titreRecette ,$descriptionRecette,$id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE newstable SET titreNews = ? , descriptionNews=?  WHERE idNews=?');
        $stmt->execute([$titreRecette ,$descriptionRecette,$id]);
        $this->deconnexion($conn);
}

public function validateRecipe($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE recette SET valideRecette=1 WHERE idRecette=?');
        $stmt->execute([$id]);
        $this->deconnexion($conn);
}

public function validateUser($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE utilisateur SET statusUtilisateur=1 WHERE idUtilisateur=?');
        $stmt->execute([$id]);
        $this->deconnexion($conn);
}

public function blockUser($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE utilisateur SET statusUtilisateur=2 WHERE idUtilisateur=?');
        $stmt->execute([$id]);
        $this->deconnexion($conn);
}

public function unblockUser($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'UPDATE utilisateur SET statusUtilisateur=1 WHERE idUtilisateur=?');
        $stmt->execute([$id]);
        $this->deconnexion($conn);
}


public function addNewsImage($idNews, $imageNews){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'INSERT INTO  imagenews (idNews, linkImage) VALUES (?,?)  ');
        $stmt->execute([$idNews,$imageNews]);
        $this->deconnexion($conn);
}

public function getDiaposRecette(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM diaporamarecette join recette on recette.idRecette=diaporamarecette.linkImage");
$this->deconnexion($conn);
return $qtf; 
}

public function getDiaposNews(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM diaporamanews join newstable on diaporamanews.linkImage=newstable.idNews");
$this->deconnexion($conn);
return $qtf; 
}

 public function getNews(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM newstable join imagenews on newstable.idNews=imagenews.idNews");
$this->deconnexion($conn);
return $qtf; 
}

public function getIngredientsNutrition(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM  ingredient");
   $this->deconnexion($conn);
return $qtf; 
}

public function getNewsRecipes(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM recette join imagerecette on recette.idRecette=imagerecette.idRecette where newsRecette=1");
$this->deconnexion($conn);
return $qtf; 
}

//for admin
public function getAllRecipes(){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
   $qtf=$conn->query("SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette left join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur");
  
$this->deconnexion($conn);
return $qtf; 
}

public function getAllRecipesNoUser(){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
   $qtf=$conn->query("SELECT idRecette,titreRecette FROM recette");
  
$this->deconnexion($conn);
return $qtf; 
}

public function getAllNews(){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
   $qtf=$conn->query("SELECT * FROM newstable left join imagenews on newstable.idNews=imagenews.idNews");
  
$this->deconnexion($conn);
return $qtf; 
}

 public function getRecettes($category){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT distinct * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.valideRecette=1 and recette.idCategorie= ?");
   $qtf->execute([$category]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesLimit($category){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT distinct * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.valideRecette=1 and recette.idCategorie= ? ORDER BY recette.notation DESC LIMIT 10");
   $qtf->execute([$category]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getIngredient($ing){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT idIngredient FROM ingredient where nomIngredient= ?");
   $qtf->execute([$ing]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}
public function getNutrition($nutrition){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT idNutrition FROM infonutrition where nomNutrition= ?");
   $qtf->execute([$nutrition]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}


public function getRecettesHealthy(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("  select * from (select DISTINCT(recette.idRecette),imagerecette.linkImage from recette join recetteingredient on recette.idRecette=recetteingredient.idRecette join ingredient on ingredient.idIngredient=recetteingredient.idIngredient join imagerecette on recette.idRecette=imagerecette.idRecette where recette.valideRecette=1 and ingredient.healthy=1 and recette.caloriesRecette<=? ) e join recette on recette.idRecette=e.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur ;   ");
   $qtf->execute([1000]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesSaison(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("
   select * from (select DISTINCT(recette.idRecette),imagerecette.linkImage from recette join recetteingredient on recette.idRecette=recetteingredient.idRecette join ingredient on ingredient.idIngredient=recetteingredient.idIngredient join imagerecette on recette.idRecette=imagerecette.idRecette where recette.valideRecette=1 and ingredient.saisonIngredient is NOT NULL ) e join recette on recette.idRecette=e.idRecette;      ");
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getAdminRecipe($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("
   SELECT * from recette where idRecette= ?  ");
   $qtf->execute([$id]);
   $this->deconnexion($conn);
   return $recipes =$qtf->fetchAll(); 
}

public function getSexeUsers($sexe){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("
   SELECT * from utilisateur where sexUtilisateur= ?  ");
   $qtf->execute([$sexe]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getUsersOrderDesc(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("
   SELECT * from utilisateur 
   ORDER BY prenomUtilisateur DESC;
   ");
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getUsersOrderAsc(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("
   SELECT * from utilisateur 
   ORDER BY prenomUtilisateur;
   ");
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesSaisonSpecific($saison){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("
   select * from (select DISTINCT(recette.idRecette),linkImage from recette join recetteingredient on recette.idRecette=recetteingredient.idRecette join ingredient on ingredient.idIngredient=recetteingredient.idIngredient join imagerecette on recette.idRecette=imagerecette.idRecette where recette.valideRecette=1 and ingredient.saisonIngredient= ? ) e join recette on recette.idRecette=e.idRecette;      ");
   //$qtf=$conn->prepare("SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.healthyRecette= 1 and recette.caloriesRecette < ?");
   $qtf->execute([$saison]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesSaisonSpecificAdmin($saison){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("
   select * from recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.valideRecette=1 and recette.saison= ?");
   //$qtf=$conn->prepare("SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.healthyRecette= 1 and recette.caloriesRecette < ?");
   $qtf->execute([$saison]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesFete(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette where recette.feteRecette <> ?");
      $qtf->execute([""]);
   $this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesFeteSpecific($fete){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("
   SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.valideRecette=1 and recette.feteRecette=?
   ");
   //$qtf=$conn->prepare("SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.healthyRecette= 1 and recette.caloriesRecette < ?");
   $qtf->execute([$fete]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecettesNutritionSpecific($fete){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("
   select * from (SELECT nutritioningredient.idIngredient FROM nutritioningredient left join infonutrition on nutritioningredient.idNutrition=infonutrition.idNutrition where nutritioningredient.idNutrition=?) as a left join ingredient on a.idIngredient=ingredient.idIngredient 
   ");
   //$qtf=$conn->prepare("SELECT * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur where recette.healthyRecette= 1 and recette.caloriesRecette < ?");
   $qtf->execute([$fete]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getUserRecettes($user){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT distinct * FROM recette join imagerecette on recette.idRecette=imagerecette.idRecette where valideRecette=1 and idUtilisateur= ?");
   $qtf->execute([$user]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getUserFavoriteRecettes($user){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT distinct * FROM recette join aimerecette ON recette.idRecette=aimerecette.idRecette left join imagerecette on recette.idRecette=imagerecette.idRecette where recette.valideRecette=1 and aimeRecette.idUtilisateur= ?");
   $qtf->execute([$user]);
   $this->deconnexion($conn);
   return $recipes =$qtf->fetchAll(); 
}

public function getUserSavedRecettes($user){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT distinct * FROM recette join imagerecette join saverecette on recette.idRecette=imagerecette.idRecette and recette.idRecette=saverecette.idRecette where recette.idUtilisateur= ?");
   $qtf->execute([$user]);
   $this->deconnexion($conn);
   return $recipes =$qtf->fetchAll(); 
}

public function getRecipeSteps($id){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT * FROM etapederecette where idRecette= ? order by numeroEtape ASC");
   $qtf->execute([$id]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecipeIngredients($id){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT * FROM recetteingredient join ingredient on recetteingredient.idIngredient = ingredient.idIngredient  where recetteingredient.idRecette= ?");
   $qtf->execute([$id]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getRecipeIngredientsSearch($id){


   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
      
        //echo $e;

   $qtf=$conn->prepare("SELECT ingredient.idIngredient FROM recetteingredient join ingredient on recetteingredient.idIngredient = ingredient.idIngredient  where recetteingredient.idRecette= ?");
   $qtf->execute([$id]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}


public function getOneRecette($category){
    $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
    $qtf=$conn->prepare("SELECT * , COUNT(DISTINCT recette.idUtilisateur) as compteurLike FROM recette left join aimerecette ON recette.idRecette=aimerecette.idRecette left join video on recette.idRecette=video.idRecette left join imagerecette on recette.idRecette=imagerecette.idRecette  where recette.idRecette=?");
    $qtf->execute([$category]);
 $this->deconnexion($conn);
 return $recipes =$qtf->fetchAll(); 
 }
 

 public function getOneIngredientNutrition($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT * FROM nutritioningredient join infonutrition on  nutritioningredient.idNutrition=infonutrition.idNutrition  where nutritioningredient.idIngredient=?");
   $qtf->execute([$id]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

 public function getOneNews($news){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT * FROM newstable left join imagenews on newstable.idNews=imagenews.idNews  where newstable.idNews=?");
   $qtf->execute([$news]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}
public function getOneNewsImages($news){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->prepare("SELECT imagenews.linkImage FROM newstable join imagenews on newstable.idNews=imagenews.idNews  where newstable.idNews=?");
   $qtf->execute([$news]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}


public function deleteIngredient($id)
{
   $conn = $this->connexion($this->dbname, $this->host, $this->port, $this->user, $this->password);

   $stmt3 = $conn->prepare( 'select * FROM nutritioningredient WHERE idIngredient= ?');
$stmt3->execute([$id]);
$count3 = $stmt3->rowCount();
if($count3>0)
{
$stmt3 = $conn->prepare( 'DELETE FROM nutritioningredient WHERE idIngredient= ?');
$stmt3->execute([$id]); 
}

$stmt3 = $conn->prepare( 'select * FROM recetteingredient WHERE idIngredient= ?');
$stmt3->execute([$id]);
$count3 = $stmt3->rowCount();
if($count3>0)
{
$stmt3 = $conn->prepare( 'DELETE FROM recetteingredient WHERE idIngredient= ?');
$stmt3->execute([$id]); 
}

   $stmt = $conn->prepare( 'DELETE FROM ingredient WHERE idIngredient= ?');
   $stmt->execute([$id]);
   $this->deconnexion($conn);   
}  

   public function deleteNews($id)
   {
      $conn = $this->connexion($this->dbname, $this->host, $this->port, $this->user, $this->password);

      $stmt3 = $conn->prepare( 'select * FROM imagenews WHERE idNews= ?');
$stmt3->execute([$id]);
$count3 = $stmt3->rowCount();
if($count3>0)
{
   $stmt3 = $conn->prepare( 'DELETE FROM imagenews WHERE idNews= ?');
   $stmt3->execute([$id]); 
}


$stmt3 = $conn->prepare( 'select * FROM diaporamanews WHERE linkImage= ?');
$stmt3->execute([$id]);
$count3 = $stmt3->rowCount();
if($count3>0)
{
   $stmt3 = $conn->prepare( 'DELETE FROM diaporamanews WHERE linkImage= ?');
   $stmt3->execute([$id]); 
}


      $stmt = $conn->prepare( 'DELETE FROM newstable WHERE idNews= ?');
      $stmt->execute([$id]);
      $this->deconnexion($conn);   
   }   

   public function deleteNewsDiapo($id)
   {
      $conn = $this->connexion($this->dbname, $this->host, $this->port, $this->user, $this->password);


      $stmt = $conn->prepare( 'DELETE FROM diaporamanews WHERE idDiapo= ?');
      $stmt->execute([$id]);
      $this->deconnexion($conn);   
   } 
   public function deleteRecipeDiapo($id)
   {
      $conn = $this->connexion($this->dbname, $this->host, $this->port, $this->user, $this->password);


      $stmt = $conn->prepare( 'DELETE FROM diaporamarecette WHERE idDiapo= ?');
      $stmt->execute([$id]);
      $this->deconnexion($conn);   
   } 

public function deleteRecipe($id){
$conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);



$stmt1 = $conn->prepare( 'select * FROM aimerecette WHERE idRecette= ?');
$stmt1->execute([$id]);
$count1 = $stmt1->rowCount();
if($count1>0)
{
   $stmt1 = $conn->prepare( 'DELETE FROM aimerecette WHERE idRecette= ?');
   $stmt1->execute([$id]); 
}
$stmt2 = $conn->prepare( 'select * FROM saverecette WHERE idRecette= ?');
$stmt2->execute([$id]);
$count2 = $stmt2->rowCount();
if($count2>0)
{
   $stmt2 = $conn->prepare( 'DELETE FROM saverecette WHERE idRecette= ?');
   $stmt2->execute([$id]); 
}

$stmt3 = $conn->prepare( 'select * FROM imagerecette WHERE idRecette= ?');
$stmt3->execute([$id]);
$count3 = $stmt3->rowCount();
if($count3>0)
{
   $stmt3 = $conn->prepare( 'DELETE FROM imagerecette WHERE idRecette= ?');
   $stmt3->execute([$id]); 
}

$stmt4 = $conn->prepare( 'select * FROM video WHERE idRecette= ?');
$stmt4->execute([$id]);
$count4 = $stmt4->rowCount();
if($count4>0)
{
   $stmt4 = $conn->prepare( 'DELETE FROM video WHERE idRecette= ?');
   $stmt4->execute([$id]); 
}

$stmt5 = $conn->prepare( 'select * FROM etapederecette WHERE idRecette= ?');
$stmt5->execute([$id]);
$count5 = $stmt5->rowCount();
if($count5>0)
{
   $stmt5 = $conn->prepare( 'DELETE FROM etapederecette WHERE idRecette= ?');
   $stmt5->execute([$id]); 
}

$stmt6 = $conn->prepare( 'select * FROM recetteingredient WHERE idRecette= ?');
$stmt6->execute([$id]);
$count6 = $stmt6->rowCount();
if($count6>0)
{
   $stmt6 = $conn->prepare( 'DELETE FROM recetteingredient WHERE idRecette= ?');
   $stmt6->execute([$id]); 
}

$stmt = $conn->prepare( 'DELETE FROM recette WHERE idRecette= ?');
$stmt->execute([$id]);
$this->deconnexion($conn);   
}







 public function getUser($user){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   
   $qtf=$conn->prepare("SELECT * from utilisateur where idUtilisateur=?");
   $qtf->execute([$user]);
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

public function getAllUsers(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   
   $qtf=$conn->query("SELECT * from utilisateur");
$this->deconnexion($conn);
return $recipes =$qtf->fetchAll(); 
}

 public function getCategories(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM categorie");
  
$this->deconnexion($conn);
return $qtf; 
}

public function getAllIngredients(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM ingredient");
  
$this->deconnexion($conn);
return $qtf; 
}

public function getAllNutritions(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT * FROM infonutrition"); 
$this->deconnexion($conn);
return $qtf; 
}

public function getSaisons(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $qtf=$conn->query("SELECT distinct saison FROM recette");
  
$this->deconnexion($conn);
return $qtf; 
}

 public function filter($cat,$saison,$cookingTime,$preparationTime,$restTime,$totalTime,$calories,$notation,$order){
    $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);		
		$sql= "SELECT distinct * FROM recette left join imagerecette on recette.idRecette=imagerecette.idRecette join utilisateur on recette.idUtilisateur=utilisateur.idUtilisateur  where recette.idCategorie = ? ";	
		 

		if(isset($saison) && $saison!=""){			
			$sql.=" AND recette.saison =('$saison')";
		}
      if(isset($notation) && $notation!=""){			
			$sql.=" AND recette.notation =('$notation')";
		}
      if(isset($cookingTime) && $cookingTime!=""){			
			$sql.=" AND recette.tempsCuisson<=('$cookingTime')";
		}
      if(isset($preparationTime) && $preparationTime!=""){			
			$sql.=" AND recette.tempsPreparation<=('$preparationTime')";
		}
      if(isset($restTime) && $restTime!=""){			
			$sql.=" AND recette.tempsRepos<=('$restTime')";
		}
      if(isset($totalTime) && $totalTime!=""){			
			$sql.=" AND recette.tempsTotal<=('$totalTime')";
		}
      if(isset($calories) && $calories!=""){			
			$sql.=" AND recette.caloriesRecette<=('$calories')";
		}
      

      if(isset($order) && $order!=""){		

if($order=="asc"){
               $sql.=" ORDER BY recette.caloriesRecette";
            }
            else{
               $sql.=" ORDER BY recette.caloriesRecette DESC";
            }	
         	}
			
	
	
            $stmt =$conn->prepare($sql); 
  $stmt->execute([$cat]);
  $this->deconnexion($conn);
  return $users =$stmt->fetchAll();      
 }

 public function filterUsersAdmin($sex,$order){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);		
     $sql= "SELECT distinct * FROM utilisateur  where idUtilisateur >= 0 ";	
      

     if(isset($sex) && $sex!=""){			
        $sql.=" AND sexUtilisateur =('$sex')";
     }
     if(isset($order) && $order!=""){
      		if($order=="asc"){
               $sql.=" ORDER BY prenomUtilisateur";
            }
            else{
               $sql.=" ORDER BY prenomUtilisateur DESC";
            }
        
     }
   
   
   
return $conn->query($sql); 
}

 public function getIngredients(){
    $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
    $qtf="SELECT * FROM ingredient ORDER by nomIngredient";
    $r=$this->requete($conn,$qtf);
    $this->deconnexion($conn);
    return $r;
 }
 public function getUtilisateurs(){
    $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
    $qtf="SELECT * FROM utilisateur";
    $r=$this->requete($conn,$qtf);
    $this->deconnexion($conn);
    return $r;
 }
 public function login($email,$password){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'SELECT * FROM utilisateur where emailUtilisateur= ? and motDePasseUtilisateur=?');
   $stmt->execute([$email,$password]);
   $this->deconnexion($conn);
   return $users =$stmt->fetchAll();          
}

public function likeRecipe($idUser,$idRecipe){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $stmt = $conn->prepare( 'INSERT INTO aimerecette (idUtilisateur,idRecette) values(?,?)');
   $stmt->execute([$idUser,$idRecipe]);
   $this->deconnexion($conn);
   return $users =$stmt->fetchAll();          
}

public function addRecipe($titre,$description,$tempsPreparation,$tempsCuisson,$tempsRepos,$tempsTotal,$healthyRecette,$caloriesRecette,$idUtilisateur,$idCategorie,$saison,$news,$fete,$difficulty){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  recette (titreRecette, descriptionRecette ,tempsPreparation , tempsCuisson ,tempsRepos , tempsTotal ,healthyRecette, caloriesRecette,idUtilisateur,idCategorie,saison,newsRecette , feteRecette,difficulteRecette,valideRecette,notation ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
         $stmt->execute([$titre,$description,$tempsPreparation,$tempsCuisson,$tempsRepos,$tempsTotal,$healthyRecette,$caloriesRecette,$idUtilisateur,$idCategorie,$saison,$news,$fete,$difficulty,1,0]);
$this->deconnexion($conn);
}

public function addRecipeUser($titre,$description,$tempsPreparation,$tempsCuisson,$tempsRepos,$tempsTotal,$healthyRecette,$caloriesRecette,$idUtilisateur,$idCategorie,$saison,$fete,$difficulty){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  recette (titreRecette, descriptionRecette ,tempsPreparation , tempsCuisson ,tempsRepos , tempsTotal , healthyRecette, caloriesRecette,idUtilisateur,idCategorie,saison , feteRecette,difficulteRecette ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
         $stmt->execute([$titre,$description,$tempsPreparation,$tempsCuisson,$tempsRepos,$tempsTotal,$healthyRecette,$caloriesRecette,$idUtilisateur,$idCategorie,$saison,$fete,$difficulty]);
$this->deconnexion($conn);
}

public function getNextIdNews(){
    $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
    $statement = $conn->query("SELECT idNews FROM newstable ORDER BY idNews DESC LIMIT 1");

			return $statement;
		
}
public function getNextIdUser(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $statement = $conn->query("SELECT idUtilisateur FROM utilisateur ORDER BY idUtilisateur DESC LIMIT 1");

        return $statement;
     
}

public function getNextIdIngredient(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $statement = $conn->query("SELECT idIngredient FROM ingredient ORDER BY idIngredient DESC LIMIT 1");

        return $statement;
     
}
public function getNextIdRecipe(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $statement = $conn->query("SELECT idRecette FROM recette ORDER BY idRecette DESC LIMIT 1");

        return $statement;
     
}

public function getNextIdEtape(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $statement = $conn->query("SELECT idEtape FROM etapederecette ORDER BY idEtape DESC LIMIT 1");

        return $statement;
     
}

public function getNextIdImage(){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
   $statement = $conn->query("SELECT idImage FROM imagerecette ORDER BY idImage DESC LIMIT 1");

        return $statement;
     
}
public function addVideoRecipe($linkVideo	,$idRecette){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  video ( linkVideo	, idRecette) VALUES (?,?)');
$stmt->execute([$linkVideo	,$idRecette]);
$this->deconnexion($conn);
}

public function addImageRecipe($linkImage	,$idRecette,$diapo=0){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  imagerecette ( linkImage	, diapo ,idRecette) VALUES (?,?,?)');
$stmt->execute([$linkImage	,$diapo,$idRecette]);
$this->deconnexion($conn);
}

public function addImageNews($linkImage	,$diapo=0,$idNews){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  imagerecette ( linkImage	, diapo ,idNews) VALUES (?,?,?)');
         $stmt->execute([$linkImage	,$diapo,$idNews]);
$this->deconnexion($conn);
}
public function addEtapeRecipe($idRecette,$contenuEtape,$numeroEtape){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  etapederecette (idRecette, contenuEtape ,numeroEtape ) VALUES (?,?,?)');
         $stmt->execute([$idRecette,$contenuEtape,$numeroEtape]);
$this->deconnexion($conn);
}
public function addIngredientRecipe($idIngredient,$idRecette,$quantite){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);

$stmt = $conn->prepare( 'INSERT INTO  recetteingredient ( idIngredient, idRecette ,quantite ) VALUES (?,?,?)');
         $stmt->execute([$idIngredient,$idRecette,$quantite]);
$this->deconnexion($conn);
}
public function addIngredient($nomIngredient,$caloriesIngredient,$healthy,$seasonIngredient,$imageIngredient){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  ingredient (nomIngredient, caloriesIngredient ,healthy,saisonIngredient,imageIngredient) VALUES (?,?,?,?,?)');
         $stmt->execute([$nomIngredient,$caloriesIngredient,$healthy,$seasonIngredient,$imageIngredient]);
$this->deconnexion($conn);
}

public function addInfoNutrition($nomNutrition){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  infonutrition ( nomNutrition ) VALUES (?)');
         $stmt->execute([$nomNutrition]);
$this->deconnexion($conn);
}

public function getIng($id){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'select * from  ingredient where idIngredient=?');
         $stmt->execute([$id]);
$this->deconnexion($conn);
}

public function addNutritionIngredient($idIngredient,$idNutrition,$quantiteNutrition){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  nutritioningredient ( idIngredient, idNutrition ,quantityNutrition ) VALUES (?,?,?)');
         $stmt->execute([$idIngredient,$idNutrition,$quantiteNutrition]);
$this->deconnexion($conn);
}
public function addNewUser($emailUtilisateur,$motDePasseUtilisateur,$admin){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  utilisateur ( emailUtilisateur, motDePasseUtilisateur ,admin ) VALUES (?,?,?)');
         $stmt->execute([$emailUtilisateur,$motDePasseUtilisateur,$admin]);
$this->deconnexion($conn);
}

public function addUnity($unite){
   $conn=$this->connexion($this->dbname,$this->host,$this->port,$this->user,$this->password);
$stmt = $conn->prepare( 'INSERT INTO  unity ( unite) VALUES (?)');
         $stmt->execute([$unite]);
$this->deconnexion($conn);
}


    }
?>