<?php

require('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $serie->name ?></title>
	<meta description="">
	<link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="font/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="main">
		<section class="left">
			<header>
				<div class="logo">Data<span class="logo-bold">Series</span></div>
                <form action="#">
                	<input type="search" class="inputstyle" placeholder="Search a serie">
					<button class="search"><i class="fa fa-search"></i></button>
				</form>
			</header>
			<h1><?= $serie->name ?></h1> 
			<p class="synopsis"><?= $serie->overview ?></h2>
			<nav>
				<ul class="seasons">
				<input type="button" name="0" value="Serie" class="seasons">
       			 <?php foreach($saison_data as $_data): 
           			 $compteur_input = $compteur_input + 1;?>
          			  <li>
        			<input type="button" name="<?= $compteur_input ?>" value="Saison <?= $compteur_input ?>" class="seasons">
        		    </li>
       			<?php endforeach; ?>
				</ul>
			</nav>
			<canvas id="seriecanvas" width="620" height="400" style="border:1px solid #000000;"></canvas>
     

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

                      <script type="text/javascript" src="serie.js"></script>

        <script>
            getData(<?=$_GET['id']?>)
        </script>

		</section>
	</div>
		<div class="right" style="background-image:url(http://image.tmdb.org/t/p/w1280<?php echo $serie->backdrop_path ?>)">
		</div>
</body>
</html>