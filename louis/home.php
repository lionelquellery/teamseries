<?php

    require ('config/config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DATASERIES</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,900,400,200' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <section>
            <img class="logo" src="logo.svg" alt="">
                <input type="search" class="inputstyle" placeholder="Recherche ta série préférée...">
        </section>

        <div class="container">
            <div class="trait"></div>
            <p class="popular">Les plus consultés :</p>
            <?php for($i = 0; $i < 19; $i++){?>    
            <div class="media"> 
                <img class="media__image" src="http://image.tmdb.org/t/p/w600<?= $data->results[$i]->backdrop_path?>" alt="" />
                <a href="#"><div class="media__body">
                    <h2><?= $data->results[$i]->original_name?></h2>
                </div></a>
            </div>
                
            <?php } ?>
        </div>
    </body>
</html>