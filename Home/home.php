<?php

    require ('index.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php for($i = 0; $i < 19; $i++){?>
        <div>
            <?= $data->results[$i]->original_name?> 
        </div>
        
        <div>
            <img src="http://image.tmdb.org/t/p/w300<?= $data->results[$i]->backdrop_path?>" alt="">
        </div>
        
        <div>
            <?= $i ?>
        </div>
        
        
    <?php } ?>
    
</body>
</html>