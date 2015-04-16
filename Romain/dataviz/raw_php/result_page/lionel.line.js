// copyrigth lionel quellery line magic javascript

//on selectionne le item courant 
var cmi = $('.current-menu-item'); 
//on selectione la ligne en cours execution 
var line = $('.line'); 
 //on divise le la taille de l'item en cours par 2
var width = cmi.width() / 2;
//par defaut on centre l'objet relativement a l'item
var defaultPosX = cmi.position().left + 9 + width; 
line.css('margin-left',defaultPosX+'px').show();
//fontion de l'item au hover 
$('nav a').hover(function () { 

    var hoverWidth = $(this).parent('li').width() / 2; 
    //calcule de l'hover position
    var newPosX = $(this).parent('li').position().left + (hoverWidth + 9); 
    
    line.css('margin-left',newPosX+'px'); 
},           
  function () {
    // on retoune la nouvelle positoon par deffaut
    line.css('margin-left',defaultPosX+'px'); 
    console.log(defaultPosX);
  }
 
);