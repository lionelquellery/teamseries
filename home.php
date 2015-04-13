<?php

    require ('home/home.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DATAVIZ</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
    

     <section id="panel-search">
        <div class="container-fluid">
            <div class="row center">
                <div class="col-xs-12">
                <hr />
                    <h1 class="logo-title">DATA<strong>SERIES</strong></h1>

                </div>
                <input type="text" class="inputstyle" placeholder="Rechercher une séries !">
            </div>

        </div>
    </section>

<section>
 <div class="container-fluid">
    <?php for($i = 0; $i < 19; $i++){?>
      
<div class="media"> <img class="media__image" src="http://image.tmdb.org/t/p/w300<?= $data->results[$i]->backdrop_path?>" alt="" />
  <div class="media__body">
    <h2><?= $data->results[$i]->original_name?></h2>
    <p><?= $i ?></p>
  </div>
</div>
        
    <?php } ?>   
    </section>
    
</body>
</html> 