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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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
			<!-- menu- -->
			<nav>
				<ul class="seasons mainnav" >
				<input type="button" name="0" value="Serie" class="seasons current-menu-item first">
       			 <?php foreach($saison_data as $_data): 
           			 $compteur_input = $compteur_input + 1;?>
          			  <li>
        			<a><input type="button" name="<?= $compteur_input ?>" value="Saison <?= $compteur_input ?>" class="seasons "></a>
        		    </li>
       			<?php endforeach; ?>
				</ul>
				<span class="line"></span>
			</nav>

			<!-- menu end-->
			<canvas id="seriecanvas" width="640" height="380" style="border:1px solid #000000;"></canvas>
 
	<script type="text/javascript" src="serie.js"></script>
    <script>
    	getData(<?=$_GET['id']?>)
    </script>
		</section>
	</div>
		<div class="right" style="background-image:url(http://image.tmdb.org/t/p/w1280<?php echo $serie->backdrop_path ?>)">
			<div class="white-block">
				<i class="fa fa-angle-right"></i>
			</div>
		</div>
		    <script type="text/javascript" src="lionel.line.js"></script>
		     

</body>
</html>