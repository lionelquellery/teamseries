<?php

    require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

       <a href="../Home/index.php">Retoougutiououyoiuour a la recherche</a>
        
<!--        Generation chaque personnages série + image de l'acteur-->
        <?php foreach($characters->cast as $_character): ?>
            <div>
                <img src="http://image.tmdb.org/t/p/w300<?= $_character->profile_path ?>" alt="">
            </div>
            <span>
                Personnage :<?= $_character->character?>
            </span>
            <span>
                Acteur : <?= $_character->name?>
            </span>
        <?php endforeach; ?>

        
    </body>
</html>