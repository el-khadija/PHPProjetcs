<?php
require_once 'connex.php';
session_start();
if(isset($_POST['valider'])){
    header('Location:index.php');
}
?>
<?php
function ajouter($cat,$titre,$prix,$qt,$url){
  if(require('connexion.php')){
    $req=$pdo->prepare("INSERT INTO Produit (ID_Categ,libelle,pu,qte_stk,url_img) VALUES ('$cat','$titre','$prix','$qt','$url')") ;
    $req->execute(array($cat,$titre,$prix,$qt,$url));
    $req->closeCursor();
  }
}
function afficher(){
  if(require('connexion.php')){
    $req=$pdo->prepare("SELECT * from Produit ORDER BY num_P DESC") ;
    $req->execute(array());
    $data=$req->fetchall(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form action="" class=" mx-5" method="post">
<div class="mb-3">
    <label class="form-label">Numéro Produit</label>
    <input type="number" class="form-control" id="" name="num" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Catégorie</label>
    <input type="text" class="form-control" id="" name="catégorie"  required>
  </div>
  <div class="mb-3">
    <label class="form-label">Libellé</label>
    <input type="text" class="form-control" id="" name="lib"  required>
  </div> 
  <div class="mb-3">
  <label class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix" >
  </div>
  <div class="mb-3">
    <label class="form-label">Quantité</label>
    <input type="text" class="form-control" name="quantité" >
  </div>
  <div class="mb-3">
    <label class="form-label">Titre de l'image</label>
    <input type="name" class="form-control" id="" requiredname="img" >
  </div>
 
  <button type="submit" class="btn btn-primary" name="valider">ADD</button>
</form>
</div>
</div>
</div>
<?php
if(isset($_POST['valider'])){
  if(isset($_POST['num']) AND isset($_POST['catégorie']) AND isset($_POST['lib']) AND isset($_POST['prix']) AND isset($_POST['quantité']) AND isset($_POST['img'])){
    if(!empty($_POST['num']) AND !empty($_POST['catégorie']) AND !empty($_POST['lib']) AND !empty($_POST['prix']) AND !empty($_POST['quantité']) AND !empty ($_POST['img'])){
      $num=htmlspecialchars($_POST['num']);
      $catégorie=htmlspecialchars($_POST['catégorie']);
      $num=htmlspecialchars($_POST['lib']);
      $num=htmlspecialchars($_POST['prix']);
      $num=htmlspecialchars($_POST['quantité']);
      $num=htmlspecialchars($_POST['img']);
      try{
        ajouter($cat,$titre,$prix,$qt,$url);
      }
      catch (Exception $e){
        $e->getMessage();
      }

    }
  }
}
?>

</body>
</html>