<?php
include 'connex.php';
session_start();
if(isset($_POST['login'])){
    header('Location:logIn.php');
}
if(isset($_POST['signin'])){
   header('Location:SignIn.php');
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
    <style>
        a{
            font-family: "Times New Roman", Times, serif;
            font-size:large;
            color:#607d8b;
            text-decoration:none;
            letter-spacing: 5px;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 3);
        }
        table {
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    img {
        width: 200px;
        height: 500px;
    }
    .cards{
        margin-left:90px; 
    }
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .pagination a {
        margin-left: 10px;
        font-size: 1.5em;
        text-decoration: none;
        color: #000;
        border: 1px solid #ccc;
        padding: 5px 10px;
        border-radius: 3px;
    }

    .pagination a:hover {
        background-color: #f5f5f5;
    }

    .pagination .current-page {
        font-weight: bold;
        background-color: #ccc;
    }
    
</style>

</head>
<body 


>
<div style="height: 20px; background-color:#FFC107;margin-left:119px;margin-right:119px;"></div>
<div id="div" class="container">
<nav class="navbar navbar-expand-sm justify-content-between px-5 fixed-top" style="background-color:#e0f2f1;">
        <!-- <a href="#" class="navbar-brand">LOGO</a> -->
        <div class="d-flex">
            <a href="#" class="h2  ms-5 me-3">KOK</a>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Catégorie</a>
                    <ul class="dropdown-menu">
                        <li><a href="" class="dropdown-item">
                        <?php 
                        //$cat->ID_Categ=1;
                        //$cat->read($cat);
                        //echo $cat->nom_Categ;?>
                        </a>Electronique</li>
                        <li><a href="" class="dropdown-item"><?php 
                        //$cat->ID_Categ=2;
                        //$cat->read();
                        //echo $cat->nom_Categ;?></a>Beauté</li>
                        <li><a href="" class="dropdown-item"><?php 
                        //$cat->ID_Categ=3;
                        //$cat->read();
                        //echo $cat->nom_Categ;?></a>Fashion</li>
                        <li><a href="" class="dropdown-item"><?php 
                        //$cat->ID_Categ=4;
                        //$cat->read();
                        //echo $cat->nom_Categ;?></a>Sports</li>
                        <li><a href="" class="dropdown-item"><?php 
                        //$cat->ID_Categ=5;
                        //$cat->read();
                       //    echo $cat->nom_Categ;?></a>Maison</li>
                    </ul>
                </li>
            </ul></div>
            <form action="" class=" mx-5" method="post">
            <a href="logIn.php"><input type="submit" value="Log In" name="login" class="btn btn-outline-info btn-sm rounded-pill me-3"></a>
            <a href="SignIn.php"><input type="submit" value="Sign In" name="signin" class="btn btn-outline-primary btn-sm rounded-pill"></a>
        </form>           
  </nav>
  <div style="height:10px; background-color:#FFC107;width:100%;"></div>
  <main>
  
          <h2 style="font-family:Arial Rounded MT Bold;" class="text-secondary fw-bold text-center mt-5 text-uppercase">Decouvrez nos Produits Maintenent</h2>
          <h6 style="font-family: Garamond;" class="text-center my-3">NOUS VOUS PROPOSONS LES MEILLEURES PRODUITS DANS NOTRE SITE</h6>  
          <!--<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="text" name="name" id="fileToUpload">
<input type="submit" value="Télécharger" name="submit">
</form>-->
</div>
<?php
/*$numP = 001;
$numPQuery = "SELECT * FROM Produit WHERE num_P = ?";
$stm = $pdo->prepare($numPQuery);
$stm->execute([$numP]);

$query = "SELECT url_img FROM Produit WHERE num_P = ?";
$res = $pdo->prepare($query);
$res->execute([$numP]);
if ($res->rowCount() > 0) {
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $imgUrl = $row['url_img'];
}*/
/*$numP="SELECT num_P From Produit WHERE num_P=?";
$stm=$pdo->prepare($numP);
$stm->execute();
$query="SELECT url_img FROM Produit WHERE num_P=$numP";
$res=$pdo->prepare($query);
if($res->execute()){
    $row=$res->fetchAll(PDO::FETCH_ASSOC);
    if ($res->rowCount()>0){
        $imgUrl = $row['url_img'];
    }
}*/

if (isset($_POST['submit'])) {
    $nom = $_POST['name'];

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $target_dir = "upload/"; 
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO Produit (libelle,pu,qte_stk,url_img)
                VALUES ('Shoes',210,130,'$target_file')";
                $pdo->exec($sql);
                 echo "Le fichier ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " a été téléchargé avec succès.";
            } else {
                echo "<script> alert('Une erreur est survenue lors du téléchargement du fichier.')</script>";
            }
        } else {
            echo "<script> alert('Seuls les fichiers de type JPG, JPEG, PNG et GIF sont autorisés.')</script>";
        }
    } else {
        echo "<script> alert('Une erreur est survenue lors du téléchargement du fichier.')</script>";
    }
}
$sql = "SELECT * FROM Produit";
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll();

    ?>
    



    <?php
include 'connex.php';

// Configuration de la pagination
/*$resultsPerPage = 4; // Nombre de résultats à afficher par page
$totalResults = $pdo->query('SELECT COUNT(*) FROM Produit')->fetchColumn(); // Total des résultats
$totalPages = ceil($totalResults / $resultsPerPage); // Calcul du nombre total de pages

// Récupération de la page courante
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

// Calcul des limites pour la requête SQL
$start = ($currentPage * $resultsPerPage ) - $resultsPerPage;
$end = $start + $resultsPerPage;

// Récupération des résultats pour la page courante
$sql = "SELECT * FROM Produit LIMIT 0, 4;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll();

var_dump($results );
?>
<div class="container">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($totalPages > 1): ?>
                    <?php if ($currentPage > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                    
                    <?php if ($currentPage < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </div>*/
    $perPage = 4; 
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($page - 1) * $perPage;


$sql = "SELECT * FROM Produit LIMIT $perPage OFFSET $offset";
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll();


$countSql = "SELECT COUNT(*) AS total FROM Produit";
$countStatement = $pdo->prepare($countSql);
$countStatement->execute();
$countRow = $countStatement->fetch(PDO::FETCH_ASSOC);
$totalItems = $countRow['total'];


$totalPages = ceil($totalItems / $perPage);

// Affichage des données paginées?>
<div class="container">
        <div class="row">
<?php
if (!empty($results))?>
    <!--foreach ($results as $row) {
        echo '<div class="produit">';
        echo '<img src="' . $row['url_img'] . '" alt="Image produit">';
        echo '<div class="price">' . $row['pu'] . '</div>';
        echo '</div>';
    }
}-->
<?php foreach ($results as $row): ?>
                <div class="col-md-4 my-3 w-25">
                    <div class="card">
                        <img src="<?php echo $row['url_img']; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body cards h6">
                            <h5 class="card-title"><?php echo $row['libelle']; ?></h5>
                            <p class="card-text">Price: <?php echo $row['pu']; ?></p>
                            <p class="card-text">Quantité: <?php echo $row['qte_stk']; ?></p>
                            <a href="ajouterProd.php"><input type="submit" value="Add to card" class="btn btn-outline-primary btn-sm"></a>
                            <a href="suppProd.php"><input type="submit" value="Reset" class="btn btn-outline-primary btn-sm"></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
// Affichage des liens de pagination
echo '<div class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a>';
}
echo '</div>';
?>
    </main>
    <footer style="padding-left:100px;padding-right:100px;">
    <div class="border-top mt-5 border-warning border-3 bg-dark d-flex  ">
    <div class="my-5 ms-5">
        <h3 class="text-light">About us</h3>
        <p class="text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur,<br> error dignissimos corporis quasi totam autem iusto omnis molestias sunt odit,<br> sint saepe incidunt aut dolores repellat, quos optio. Recusandae, minima?</p>
    </div>
    <div class="my-5 ms-5">
        <h3 class="text-light">CATEGORIES</h3>
           <a href="#" class="text-light">Hot Deals</a>
            <a href="#" class="nav-link text-light">Electronique</a>
            <a href="#" class="nav-link text-light">Beauté</a>
            <a href="#" class="nav-link text-light">Fashion</a>
            <a href="#" class="nav-link text-light">Sports</a>
    </div>
    <div class="my-5 ms-5">
        <h3 class="text-decoration-none text-light">Contact US</h3>
        <div><a href="" class="text-decoration-none text-light">+021-95-51-84</a></div>
        <div><a href="#" class="text-decoration-none text-light"> email@email.com</a></div>
        <div><a href="#" class="text-decoration-none text-light">1734 Stonecoal Road</a></div>
    </div>
</div>
    </footer>
</body>
</html>