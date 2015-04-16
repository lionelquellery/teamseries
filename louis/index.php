<?php

    require ('raw_php/home/home.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DATASERIES</title>
        <link rel="stylesheet" type="text/css" href="ressources/css/reset.css">
        <link rel="stylesheet" type="text/css" href="ressources/css/home.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,900,400,200' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <section>
                <?php if(!empty($_POST['search'])){?>
                <div class="suggest"  id="hideme">
                <a href="#" onClick="hide('hideme')" class="close">CLOSE ×</a>

                <?php if($search->total_results == 0){ ?>
                    <div class='sorry'>
                        Oops, no TV show matches your search...
                    </div>
                <?php } else{?>

                   <div class='success'>
                   <div class='upperline'></div>
                    <h2>You're maybe looking for :</h2>
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
                <input type="search" class="inputstyle" placeholder="Search your favourite series..." name="search">    
            </form> 

        </section>

        <div class="container">
            <div class="line"></div>
            <p class="popular">Most popular TV shows :</p>
            <?php for($i = 0; $i < 19; $i++){?>    
            <div class="media" data-sr="enter top, ease down 20%"> 
                <img class="media__image" src="http://image.tmdb.org/t/p/w600<?= $data->results[$i]->backdrop_path?>" alt="" />
                <a href="raw_php/result_page/result.php?id=<?= $data->results[$i]->id ?>"><div class="media__body">
                    <h2><?= $data->results[$i]->original_name?></h2>
                </div></a>
            </div>
                
            <?php } ?>
        </div>

        <script src='ressources/js/scrollReveal.min.js'></script>
        <script>
            window.sr = new scrollReveal();
        </script>
        <script>
            function hide(obj) {
                var el = document.getElementById(obj);
                el.style.display = 'none';
            }

        </script>
    </body>
</html>