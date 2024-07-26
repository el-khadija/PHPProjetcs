<?php
  $servername="localhost";
  $username="root";
  $password="";
try{
    $pdo=new PDO("mysql:host=localhost;dbname=SiteCommerce;charset=utf8",$username,"");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connexion failed :".$e->getMessage();
    }
   
?>