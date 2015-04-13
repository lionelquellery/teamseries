<?php

// Clef d'accès au API
$key = '?api_key=d0a923b609a899bbb5a493dc98fe31bd';
// Curl accès aux Infos de la séries
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/tv/popular".$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);
// Conversion de Json en PHP
$data = json_decode($response); 
