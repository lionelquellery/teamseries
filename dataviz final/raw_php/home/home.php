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

// Fnction de cherche
$ch = curl_init();

if(!empty($_POST['search'])){
    $key_search = '&api_key=d0a923b609a899bbb5a493dc98fe31bd';
    //chaine de caractère de l'utilisateur
    $research = $_POST['search'];

curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/tv?query=".$research.$key_search);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Accept: application/json"
));

$response = curl_exec($ch);
curl_close($ch);

$search = json_decode($response);

}