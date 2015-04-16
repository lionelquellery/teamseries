<?php

require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    </head>
    <body>

        <a href="../../index.php"> Retour a la recherche</a>


        <!--       h1 qui affiche le nom de la série-->
        <h1>
            <?= $serie->name ?>
        </h1>
        <!--       résumé de la serie-->
        <div>
            <?= $serie_overview ?>
        </div>
        <!--       affiche de la série-->
        <div>
            <img src="http://image.tmdb.org/t/p/w1280<?= $serie->backdrop_path ?>" alt="">
        </div>

        <!--        Generation chaque personnages série + image de l'acteur-->
        <?php foreach($characters->cast as $_character): ?>
        <!--           image      -->
        <div>
            <img src="http://image.tmdb.org/t/p/w300<?= $_character->profile_path ?>" alt="">
        </div>
<!--        nom du personnage joué   -->
        <span>
            Personnage :<?= $_character->character?>
        </span>
<!--        nom de l'acteur   -->
        <span>
            Acteur : <?= $_character->name?>
        </span>
        <?php endforeach; ?>
<!--generation du canvas-->
        <?php if(empty($average_seasons->episodes)){ ?>
<!--        affiche de l'erreur en cas de serie vide-->
        <div><?= $error ?></div>
        <?php }
//sinon affichage du canvas et du nombre du boutton en fonction du nombre de saison
        else{ ?>
        <input type="button" name="0" value="Serie">
        <?php foreach($saison_data as $_data): 
            $compteur_input = $compteur_input + 1;?>
        <input type="button" name="<?= $compteur_input ?>" value="Saison <?= $compteur_input ?>">
        <?php endforeach; ?>
<!--        canvas   -->
        <canvas id="seriecanvas" width="1000" height="500" style="border:1px solid #000000;"></canvas>
        <?php } ?>
        
        <?php
        if(!empty($similar->results[0])){ ?>
            <a href="result.php?id=<?= $similar->results[0]->id ?>">
                <div>
                    <img src="http://image.tmdb.org/t/p/w600<?= $similar->results[0]->backdrop_path?>" alt="">
                </div>
            </a>
        <?php }else{ ?>
            <div>
             NOooooooooooooooooooooooooooooooooooo
             </div>
        <?php } ?>                


        <script src="serie.js"></script>             
        <script>
            getData(<?=$_GET['id']?>)
        </script>

    </body>
</html>