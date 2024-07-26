<?php
require_once 'connex.php';
session_start();
if(isset($_POST['valider'])){
    header('Location:index.php');
}
?>
<?php
function supprimer($id){
  if(require('connexion.php')){
    $req=$pdo->prepare("DELETE * from Produit where num_P=?") ;
    $req->execute(array($id));
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
 
  <button type="reset" class="btn btn-primary" name="supp">Reset</button>
</form>
</div>
</div>
</div>
<?php
if(isset($_POST['supp'])){
  if(isset($_POST['num'])){
    if(!empty($_POST['num'])){
      $num=htmlspecialchars(scrip_tags($_POST['num']));
      try{
        supprimer($num);
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