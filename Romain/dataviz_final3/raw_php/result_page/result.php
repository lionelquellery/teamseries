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
            <div class="clear"></div>
		        <div class="popularity open">
                	<h1><?= $serie->name ?></h1> 
        			<p class="synopsis"><?= $serie_overview ?></h2>
        			<nav>
                       <!--generation du canvas-->
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
                        <!--Bouton next-->
                        <div class="next">
                            <i class="fa fa-angle-down"></i>
                        </div>
                </div>
                <div class="characters hidden">
                    <div class="prec">
                        <i class="fa fa-angle-up"></i>
                    </div>
                    <!--Generation chaque personnages série + image de l'acteur-->
                    <?php foreach($characters->cast as $_character): ?>
                    <!--image-->
                    <div class="col-half">
                        <div style="background-image:url(http://image.tmdb.org/t/p/w154<?= $_character->profile_path ?>)" class="radius-img">
                        </div>
                        <!--nom du personnage joué-->
       
                                <p class="charactername">
                                    <?= $_character->name?>
                                </p>
                         
                        <!--nom de l'acteur-->
                                <p class="actorname">
                                    <span class="as">As </span><?= $_character->character?>
                                </p>
                            <div class="next2">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
        
            <script>
            $('.next').click(function (e)
            {
                e.preventDefault();
                $('.open').removeClass('open').addClass('hidden');
                $('.characters').removeClass('hidden').addClass('open');
            });

            $('.next2').click(function (e)
            {
                e.preventDefault();
                $('.characters').removeClass('open').addClass('hidden');
                $('.Lionel').removeClass('hidden').addClass('open');
            });

            $('.prec').click(function (e)
            {
                e.preventDefault();
                $('.open').removeClass('open').addClass('hidden');
                $('.popularity').removeClass('hidden').addClass('open');
            });
            </script>
                </div>
                 <div class="Lionel hidden">
                    <div class="prec2">
                        <i class="fa fa-angle-up"></i>
                    </div >


                        <ul class="timeline" id="timeline">
                          <li class="li complete">
                            <div class="timestamp">
                              <span class="episode">first episode</span>
                              <span class="date"><?= $serie->first_air_date ?><span>
                            </div>
                            <div class="status">
                              
                            </div>
                          </li>
                          
                          <li class="li complete">
                            <div class="timestamp">
                              <span class="episode">Last episode</span>
                              <span class="date"><?= $serie->last_air_date ?><span>
                            </div>
                            <div class="status">
                            </div>
                          </li>
                         
                         </ul>      

                        <!--  Container  -->
<ul class="progress">
    
    <li data-name="Numbers of episodes" data-percent="<?= $serie->number_of_episodes ?>">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="2" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="547"></path>
        </svg>
    </li>
    <li data-name="Number of seasons" data-percent="<?= $serie->number_of_seasons ?>
   ">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="2" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="547"></path>
        </svg>
    </li>
   
   
</ul>
<!--  Defining Angle Gradient Colors  -->
<svg width="0" height="0">
<defs>
<linearGradient id="cl1" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="1" y2="1">
    <stop stop-color="#618099"/>
    <stop offset="100%" stop-color="#8e6677"/>
</linearGradient>
<linearGradient id="cl2" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="0" y2="1">
    <stop stop-color="#8e6677"/>
    <stop offset="100%" stop-color="#9b5e67"/>
</linearGradient>
<linearGradient id="cl3" gradientUnits="objectBoundingBox" x1="1" y1="0" x2="0" y2="1">
    <stop stop-color="#9b5e67"/>
    <stop offset="100%" stop-color="#9c787a"/>
</linearGradient>
<linearGradient id="cl4" gradientUnits="objectBoundingBox" x1="1" y1="1" x2="0" y2="0">
    <stop stop-color="#9c787a"/>
    <stop offset="100%" stop-color="#817a94"/>
</linearGradient>
<linearGradient id="cl5" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="0" y2="0">
    <stop stop-color="#817a94"/>
    <stop offset="100%" stop-color="#498a98"/>
</linearGradient>
<linearGradient id="cl6" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="1" y2="0">
    <stop stop-color="#498a98"/>
    <stop offset="100%" stop-color="#618099"/>
</linearGradient>
</defs>
</svg>
                    </div>
		</section>
        <script>
          $('.prec2').click(function (e)
            {
                e.preventDefault();
                $('.open').removeClass('open').addClass('hidden');
                $('.characters').removeClass('hidden').addClass('open');
                $('.prec2').addClass('open');
            });
        </script>
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
</html>