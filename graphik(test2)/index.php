<?php
//require('data.json');

$json = file_get_contents('data.json');
$data = json_decode($json);
$compteur = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Series - Graphik</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
    <body>
        <input type="button" name="0" value="Serie">
        <?php foreach($data as $_data): 
            $compteur = $compteur + 1;?>
            <input type="button" name="<?= $compteur ?>" value="Saison <?= $compteur ?>">
        <?php endforeach; ?>
        <div class="seriecanvas_wrp">
            <canvas id="seriecanvas" width="620" height="380"></canvas>
        </div>
        
        <script type="text/javascript" src="serie.js"></script>
    </body>
</html>