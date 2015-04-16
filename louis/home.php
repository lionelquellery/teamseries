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
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    </head>
    <body>
        <section>
            <img class="logo" src="logo.svg" alt="">
            <div></div>
            <input type="search" class="inputstyle" placeholder="Recherche ta série préférée...">
            <input border=0 src="search.svg" type=image Value=submit> 
        </section>

        <div class="container">
            <div class="line"></div>
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
        <script>
            $(window).scroll(function() {
                $('.media').each(function(){
                    var imagePos = $(this).offset().top;

                    var bottomOfWindow = $(window).scrollTop()+ $(window).height();
                        if (imagePos < bottomOfWindow-60) {
                            $(this).addClass("opacity");
                    }
                });
            });
        </script>
    </body>
</html>