<?php

// Clef d'accès au API
$key = '?api_key=d0a923b609a899bbb5a493dc98fe31bd';
// Curl accès aux Infos de la séries
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/tv/popular".$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);
// Conversion de Json en PHP
$data = json_decode($response); 

// Fnction de cherche
$ch = curl_init();

if(!empty($_POST['search'])){
    $key_search = '&api_key=d0a923b609a899bbb5a493dc98fe31bd';
    //chaine de caractère de l'utilisateur
    $research = $_POST['search'];

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/tv?query=".$research.$key_search);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

$search = json_decode($response);

<<<<<<< HEAD
}
=======
    require ('home.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<!--    Formulaire ou l'utilisateur entre sa cherche-->
    <form action="#" method="post">
        <label for="search">Ta recherche</label>
        <input type="text" name="search">
        <input type="submit">
    </form>
    
<!--    verification que la cherche n'est pas vide-->
    <?php if(!empty($_POST['search'])){
        //vérification qu'il y a au moins une sugéstion et...
        if($search->total_results == 0){ ?>
<!--           ... affichage message d'erreur ou ...-->
            <div>
                Désole, aucune série ne correspond à votre cherche...
            </div>
        <?php } else{?>
<!--           ... suggéstions-->
            <div>Tu cherche peut etre :</div>
        <?php } ?>
    
<!--    affichege de toutes les produits pouvant correspondre a la recherche de l'utilisateur-->
        <?php foreach($search->results as $_result):?>
        <a href="../result_page/result.php?id=<?= $_result->id?>">
        <span>
            <img src="http://image.tmdb.org/t/p/w45<?= $_result->backdrop_path?>" alt="">
        </span>
        <span>
            <?= $_result->original_name ?>
        </span>
        </a>
        <br>
    <?php endforeach; }?>
    
<!--        affiche des séries les plus populaires en ce moment dans ordre de popularité-->
    <?php for($i = 0; $i < 19; $i++){?>
       <a href="../result_page/result.php?id=<?= $data->results[$i]->id ?>">
        <div>
            <?= $data->results[$i]->original_name?> 
        </div>
        
        <div>
            <img src="http://image.tmdb.org/t/p/w300<?= $data->results[$i]->backdrop_path?>" alt="">
        </div>
        
        <div>
            <?= $i+1 ?>
        </div>
        </a>
    <?php } ?>
    
</body>
</html>
>>>>>>> origin/master
