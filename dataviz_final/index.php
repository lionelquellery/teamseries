<?php

    require ('raw_php/home/home.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DATASERIES</title>
        <link rel="stylesheet" type="text/css" href="ressources/css/reset.css">
        <link rel="stylesheet" type="text/css" href="ressources/css/home/style.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,900,400,200' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <section>
            <img class="logo" src="ressources/img/logo.svg" alt="">    
            <form action="#" method="post">
                <input type="search" class="inputstyle" placeholder="Recherche ta série préférée..." name="search">    
            </form>   
        </section>
        

    <?php if(!empty($_POST['search'])){

        if($search->total_results == 0){ ?>

            <div class='suggest'>
                Désole, aucune série ne correspond à votre cherche...
            </div>
        <?php } else{?>
          <!--           ci dessous la div des suggéstion     -->
           <div>
            <div>Tu cherche peut etre :</div>
        <?php } ?>
    
        <?php foreach($search->results as $_result):?>
<!--        et ici les différents info affiché par les suggéstions     -->
        <a href="raw_php/result_page/result.php?id=<?= $_result->id?>">
        <span>
            <img src="http://image.tmdb.org/t/p/w45<?= $_result->backdrop_path?>" alt="">
        </span>
        <span>
            <?= $_result->original_name ?>
        </span>
        </a>
        <br>
    <?php endforeach; }?>
        </div>

        <div class="container">
            <div class="trait"></div>
            <p class="popular">Les plus consultés :</p>
            <?php for($i = 0; $i < 19; $i++){?>    
            <div class="media"> 
                <img class="media__image" src="http://image.tmdb.org/t/p/w600<?= $data->results[$i]->backdrop_path?>" alt="" />
                <a href="raw_php/result_page/result.php?id=<?= $data->results[$i]->id ?>"><div class="media__body">
                    <h2><?= $data->results[$i]->original_name?></h2>
                </div></a>
            </div>
                
            <?php } ?>
        </div>
    </body>
</html>