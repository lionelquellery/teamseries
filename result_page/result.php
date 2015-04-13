<?php

//  NOMBRE DE SAISON

$ch = curl_init();

$key = '?api_key=d0a923b609a899bbb5a493dc98fe31bd';
$key_series = '1402';

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$key_series."/changes".$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

$number_saison = json_decode($response);


//  NOMBRE D'EPISODE PAR SAISON

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$key_series.$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

$number_episodes = json_decode($response);
$counter = $number_episodes->seasons;

// PERSONNAGES

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$key_series."/credits".$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

$characters = json_decode($response);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <script>
            // Génaration tableau nombre de saison = nombre de valeur / nombre d'épisode dans la saison la valeur.
            var saison_episode = [
                <?php
                    $ct = 0;
                foreach($counter as $_episodes): 
                    $ct = $ct+1;
                    $episode =$ct-1;?>
                <?= $counter[$episode]->episode_count ?>,
                <?php endforeach; ?>
            ];
            //Génération un tableau par saison des notes des épisodes
            <?php

                for($x=0; $x < $ct ; $x++){

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$key_series."/season/".$x.$key);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);

                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            "Accept: application/json"
                    ));

                    $response = curl_exec($ch);
                    curl_close($ch);
                    $average_seasons = json_decode($response);
            ?>

            var average_saison<?=$x?> = [
                <?php foreach($average_seasons->episodes as $episode_average):?>
                <?= $episode_average->vote_average?>,
                <?php endforeach; ?>
            ];

            <?php } 
            
            
               
            ?>            
        </script>
        
<!--        Generation chaque personnages série + image de l'acteur-->
        <?php foreach($characters->cast as $_character): ?>
            <div>
                <img src="http://image.tmdb.org/t/p/w300<?= $_character->profile_path ?>" alt="">
            </div>
            <div>
                <?= $_character->character?>
            </div>
        <?php endforeach; ?>
        
    </body>
</html>