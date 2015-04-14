<?php
//  NOMBRE DE SAISON

$ch = curl_init();

$key = '?api_key=d0a923b609a899bbb5a493dc98fe31bd';
$key_series = $_GET['id'];

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

$serie = json_decode($response);
$counter = $serie->seasons;

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

$saison_data = array();

                    $ct = 0;

                foreach($counter as $_episodes): 
                    $ct = $ct+1;
                $episode =$ct-1;
                $saison_data += array($_episodes->season_number => array());
                endforeach;

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
                        $compteur=0;
                    foreach($average_seasons->episodes as $episode_average):
                        $compteur = $compteur + 1;
                        $fill = $episode_average->vote_average;
                        $saison_data[$x] += array_fill(0, $compteur, $fill);
                    endforeach;
                }

$data = json_encode($saison_data);
  