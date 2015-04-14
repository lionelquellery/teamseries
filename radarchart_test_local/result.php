<?php

//  NOMBRE DE SAISON

$ch = curl_init();

$key = '?api_key=d0a923b609a899bbb5a493dc98fe31bd';
$key_series = '1399';

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

$ct = 0;

$counter = $number_episodes->seasons;

//    echo '<pre>';
//    print_r($counter);
//    echo '</pre>';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Radar test</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <p>Pour une série '$key_series', les scores des épisodes compris dans l'API sont : </p>
    <div class="canvas_wrapper">
        <canvas id="canvas_episode" class="canvas" width="600" height="600"></canvas>
        <canvas id="canvas_season" class="canvas" width="600" height="600"></canvas>
    </div>
    
    <script>
    <?php foreach($counter as $_episodes): 
        $ct = $ct+1;
        $episode =$ct-1;?>
        var nombre_episode_saison<?=$ct?> = <?= $counter[$episode]->episode_count ?>;
    <?php endforeach; ?>
        var nombre_saison =<?= $ct?>;

    </script>
    <script src="js/script.js"></script>
</body>
</html>
