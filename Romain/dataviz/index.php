<?php

    require ('raw_php/home/home.php');

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
        <a href="raw_php/result_page/result.php?id=<?= $_result->id?>">
<!--        affiche format icon de la serie (* pour modifier le format de l'image, il faut toucher a la valeur apres le w. Dans le cas c'est w45)-->
        <span>
            <img src="http://image.tmdb.org/t/p/w45<?= $_result->backdrop_path?>" alt="">
        </span>
<!--        nom de la serie    -->
        <span>
            <?= $_result->original_name ?>
        </span>
        </a>
        <br>
    <?php endforeach; }?>
    
<!--        affiche des séries les plus populaires en ce moment dans ordre de popularité-->
    <?php for($i = 0; $i < 19; $i++){?>
       <a href="raw_php/result_page/result.php?id=<?= $data->results[$i]->id ?>">
<!--       nom de la serie    -->
        <div>
            <?= $data->results[$i]->original_name?> 
        </div>
<!--        image de la serie   -->
        <div>
            <img src="http://image.tmdb.org/t/p/w300<?= $data->results[$i]->backdrop_path?>" alt="">
        </div>
<!--        classement de la serie sur 19-->
        <div>
            <?= $i+1 ?>
        </div>
        </a>
    <?php } ?>
    
</body>
</html>