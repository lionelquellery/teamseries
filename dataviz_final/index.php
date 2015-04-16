<?php

    require ('raw_php/home/home.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DATASERIES</title>
        <link rel="stylesheet" type="text/css" href="ressources/css/reset.css">
        <link rel="stylesheet" type="text/css" href="ressources/css/home/home.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,900,400,200' rel='stylesheet' type='text/css'>
        
    </head>
    <body>
        <section>
                <?php if(!empty($_POST['search'])){?>
                <div class="suggest"  id="hideme">
                <a href="#" onClick="hide('hideme')" class="close">CLOSE ×</a>

                <?php if($search->total_results == 0){ ?>
                    <div class='sorry'>
                        Désolé, aucune série ne correspond à votre recherche...
                    </div>
                <?php } else{?>

                   <div class='success'>
                   <div class='upperline'></div>
                    <h2>Tu cherche peut etre :</h2>
                <?php } ?>
            
                <?php foreach($search->results as $_result):?>
                <a href="raw_php/result_page/result.php?id=<?= $_result->id?>">
                <span class='img'>
                    <img src="http://image.tmdb.org/t/p/w75<?= $_result->backdrop_path?>" alt="">
                </span>
                <span>
                    <?= $_result->original_name ?>
                </span>
                </a>
                <br>
            <?php endforeach; }?>
                </div>
            </div>

            <img class="logo" src="ressources/img/logo.svg" alt="">    
            <form action="#" method="post">
                <input type="search" class="inputstyle" placeholder="Recherche ta série préférée..." name="search">    
            </form> 
        

        </section>
        <div class="container">
            <div class="line"></div>
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
        
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="ressources/js/app.js"></script>
    </body>
</html>