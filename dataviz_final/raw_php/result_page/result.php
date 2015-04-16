<<<<<<< Updated upstream
=======
<<<<<<< HEAD
<?php

require('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $serie->name ?></title>
	<meta description="">
    <link rel="stylesheet" href="../../ressources/css/reset.css">
	<link rel="stylesheet" href="../../ressources/css/result/style.css">
	<link rel="stylesheet" href="../../ressources/font/font-awesome/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

</head>
<body>
	<div class="main">
<!--	logo        -->
		<section class="left">
			<header>
                <a href="../../index.php"><div class="logo">Data<span class="logo-bold">Series</span></div></a>
                <form action="#" method="post">
                	<input type="search" class="inputstyle" placeholder="Search a serie" name="search">
					<button class="search"><i class="fa fa-search"></i></button>
				</form>
			</header>
			
<!--			info de la serie    -->
			<h1><?= $serie->name ?></h1> 
			<p class="synopsis"><?= $serie_overview ?></h2>
			<nav>
				
<!--				generation du canvas      -->
				<?php if(empty($average_seasons->episodes)){ ?>
                    <div class="synopsis"><?= $error ?></div>
                <?php }
                else{ ?>
                <ul class="seasons">
                    <li>
				        <input type="button" name="0" value="Serie" class="seasons active first">
                    </li>
       			 <?php foreach($saison_data as $_data): 
           			 $compteur_input = $compteur_input + 1;?>
          			  <li>
        			<input type="button" name="<?= $compteur_input ?>" value="Saison <?= $compteur_input ?>" class="seasons">
        		    </li>
       			<?php endforeach; ?>
				</ul>
			</nav>
			<div class="seriecanvas_wrp">
                
			    <canvas id="seriecanvas" width="620" height="380"></canvas>
            </div>
            <?php } ?>
		</section>
	</div>
<!--	    image de droite -->
		<div class="right" style="background-image:url(http://image.tmdb.org/t/p/w1280<?php echo $serie->backdrop_path ?>)">
     
     
     
<!--        Generation chaque personnages série + image de l'acteur-->
        <?php foreach($characters->cast as $_character): ?>
<!--           image      -->
        <div>
            <img src="http://image.tmdb.org/t/p/w300<?= $_character->profile_path ?>" alt="">
        </div>
<!--        nom du personnage joué   -->
        <span>
            Personnage :<?= $_character->character?>
        </span>
<!--        nom de l'acteur   -->
        <span>
            Acteur : <?= $_character->name?>
        </span>
        <?php endforeach; ?>
     
      
<!--          suggestions autre series   -->
       <?php if(!empty($similar->results[0])){ ?>
           <div class="white-block">
				<i class="fa fa-angle-right"></i>
                    <a href="result.php?id=<?= $similar->results[0]->id ?>">
                        <span class="suggestion">
                            <img src="http://image.tmdb.org/t/p/w600<?= $similar->results[0]->backdrop_path?>" alt="">
                        </span>
                    </a>
            </div>
        <?php }?>
		</div>
		
    <script type="text/javascript" src="../../ressources/js/serie.js"></script>
    <script type="text/javascript" src="../../ressources/js/lionel.loader.js"></script>
    <script>
    	getData(<?=$_GET['id']?>)
    </script>
		
</body>
=======
>>>>>>> Stashed changes
<?php

require('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $serie->name ?></title>
	<meta description="">
    <link rel="stylesheet" href="../../ressources/css/reset.css">
	<link rel="stylesheet" href="../../ressources/css/result/style.css">
	<link rel="stylesheet" href="../../ressources/font/font-awesome/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

</head>
<body>
	<div class="main">
<!--	logo        -->
		<section class="left">

			<header>
                <a href="../../index.php"><div class="logo">Data<span class="logo-bold">Series</span></div></a>
                <form action="#" method="post">
                	<input type="search" class="inputstyle" placeholder="Search a serie" name="search">
					<button class="search"><i class="fa fa-search"></i></button>
				</form>
			</header>
		  <div class="popularity">
        	<h1><?= $serie->name ?></h1> 
			<p class="synopsis"><?= $serie_overview ?></h2>
			<nav>
				
<!--				generation du canvas      -->
				<?php if(empty($average_seasons->episodes)){ ?>
                    <div class="synopsis"><?= $error ?></div>
                <?php }
                else{ ?>
                <ul class="seasons">
                    <li>
				        <input type="button" name="0" value="Serie" class="seasons active first">
                    </li>
       			 <?php foreach($saison_data as $_data): 
           			 $compteur_input = $compteur_input + 1;?>
          			  <li>
        			<input type="button" name="<?= $compteur_input ?>" value="Saison <?= $compteur_input ?>" class="seasons">
        		    </li>
       			<?php endforeach; ?>
				</ul>
			</nav>
			<div class="seriecanvas_wrp">
                
			    <canvas id="seriecanvas" width="620" height="380"></canvas>
            </div>
            <?php } ?>
                 <div class="next">
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>


		</section>
	</div>
<!--	    image de droite -->
		<div class="right" style="background-image:url(http://image.tmdb.org/t/p/w1280<?php echo $serie->backdrop_path ?>)">
     
      
<!--          suggestions autre series   -->
       <?php if(!empty($similar->results[0])){ ?>
           <div class="white-block">
				<i class="fa fa-angle-right"></i>
                <a href="result.php?id=<?= $similar->results[0]->id ?>">
                    <span class="suggestion">
                        <img src="http://image.tmdb.org/t/p/w600<?= $similar->results[0]->backdrop_path?>" alt="">
                    </span>
                </a>
            </div>
        <?php }?>
		</div>
		
    <script type="text/javascript" src="../../ressources/js/serie.js"></script>
    <script>
    	getData(<?=$_GET['id']?>)
    </script>
		
</body>
<<<<<<< Updated upstream
=======
>>>>>>> origin/master
>>>>>>> Stashed changes
</html>