// (nouvelle) charte graphique  :
// 1- flèche du bas      = 6fb4a1; 
// 1- barre de recherche = 87b1a7;
// 2- légende            = 87b1a7;
// 3- stroke             = 73afa3;
// 4- end fill           = 73afa3;
// 4* start fill         = eff8f7;


$.getJSON( "data.json", function( data ) {
    init(data);
});

function init(data) {

    var canvas = document.getElementById("seriecanvas"),
           ctx = canvas.getContext("2d"),
         width = canvas.width,
        height = canvas.height,
    dataLenght = data.length;

    //fade canvas
    $(canvas).animate({opacity: 0}, 0).stop().delay(800).stop().animate({opacity: 1}, 700);
    $('.txt-episode-season').animate({opacity: 0}, 0).stop().delay(800).stop().animate({opacity: 1}, 700);

    function serie(){

           var dataLenghtz = data.length,
              repartition1 = width / dataLenghtz,
        repartition1Change = (-0.5) * (repartition1);

        //begin drawing
        ctx.beginPath();
        ctx.moveTo(0,380);


        //change text of legend
        $('.txt-episode-season').animate({opacity: 0}, 350, function(){$(this).replaceWith("<p class='txt-legend txt-episode-season'>SEASONS</p>")}).animate({opacity: 1}, 350);

        for(i=0;i<dataLenght;i++){

            var count = 0;


            for(x = 0; x <data[i].length; x++) 
            { 
                count += data[i][x];
            }
            repartition1Change = repartition1Change + repartition1;

            // x & y coords.
            var xCoords = repartition1Change,
                yCoords = ((-1) * (((count*30)/ (data[i].length)))) + 375 - 10,
                r=20;

            ctx.lineTo( xCoords, yCoords);
            ctx.strokeStyle = "#73afa3";
              ctx.lineWidth = "6";

            //gradient
            var my_gradient = ctx.createLinearGradient(0, 0, 0, 380);
            my_gradient.addColorStop(0, "#73afa3");
            my_gradient.addColorStop(1, "#eff8f7");
            ctx.fillStyle = my_gradient;

            //add "a" Element
            var $linkSeries = $("<a >", { class: "link_series transition important", href:"#", "data-season" : i});
            $(".seriecanvas_wrp").append($linkSeries);
            $linkSeries.css({ left:(xCoords-12)+"px", top:(yCoords-15)+"px"});
            // $linkSeries.after().css({ left:(xCoords-12)+"px", top:(yCoords-19)+"px", width:10+(1/yCoords)*1000+"px", height:10+(1/yCoords)*1000+"px", background:'white', border: 'solid 3px #cb4460', borderRadius:"1000px"});
            $linkSeries.append( "<span class='name-of-saison'>Season "+(i+1)+"</span>" );
        }
        //draw canvas
        ctx.lineJoin = "round";
        ctx.stroke();
        ctx.lineTo(569,380);
        ctx.moveTo(569,380);
        ctx.fill();
    }
    serie();
    tryhard();

    $('input').click(function(){

        var inputName = $(this).attr('name');
        inputName = inputName -1;

        //fade in fade out
        $(canvas).animate({opacity: 0}, 0).stop().delay(800).stop().animate({opacity: 1}, 700);
        ctx.clearRect ( 0 , 0 , width, height );
        $('.seriecanvas_wrp a').remove();
        
        if(inputName === -1)
        {
            serie();
            tryhard();
        }
        else{
        //change text of legend
        $('.txt-episode-season').animate({opacity: 0}, 350, function(){$(this).replaceWith("<p class='txt-legend txt-episode-season'>EPISODES</p>")}).animate({opacity: 1}, 350);
           
            ctx.beginPath();
            ctx.moveTo(0,380);

            var dataLenght2 = data[inputName].length,
              repartition2       = (width) / dataLenght2,
              repartition1Change = (-0.5)*(repartition2);

            for(i=0;i<dataLenght2;i++){
                repartition1Change = repartition1Change + repartition2;

                var val = data[inputName][i];
                var xCoords = repartition1Change,
                    yCoords = ((-1)*((val*90)/3))+375-10,
                    r=10; 

                ctx.lineTo( xCoords, yCoords);
                // ctx.strokeStyle="#cb4460";
                ctx.strokeStyle="#73afa3;";
                ctx.lineWidth = "6";

                //add "a" Element
                var $linkSeries = $("<a>", { class: "link_series transition", href:"#"});
                $(".seriecanvas_wrp").append($linkSeries);
                $linkSeries.css({ left:(xCoords-15)+"px", top:(yCoords-12)+"px"});

                
                $linkSeries.append( "<span class='name-of-ep'>EP "+(i+1)+"</span>" );
            }

            var my_gradient = ctx.createLinearGradient(0, 0, 0, 380);
            my_gradient.addColorStop(0, "#73afa3");
            my_gradient.addColorStop(1, "#eff8f7");
            ctx.fillStyle = my_gradient;
            ctx.lineJoin = "round";
            ctx.stroke();
            ctx.lineTo(588,380);
            ctx.moveTo(588,380);
            ctx.fill();
        }
    });

    function tryhard(){
        $('.important').click( function(){

            var detect = $(this).attr('data-season');
            ctx.clearRect ( 0 , 0 , width, height );

            $('.seriecanvas_wrp a').remove();

            //change text of legend
            $('.txt-episode-season').animate({opacity: 0}, 350, function(){$(this).replaceWith("<p class='txt-legend txt-episode-season'>EPISODES</p>")}).animate({opacity: 1}, 350);

            //fades
            $(canvas).animate({opacity: 0}, 0).stop().delay(800).stop().animate({opacity: 1}, 700);

            ctx.beginPath();
            ctx.moveTo(0,380);

            var dataLenght2 = data[detect].length,
            repartition2       = (width) / dataLenght2,
            repartition1Change = (-0.5)*(repartition2);

            for(i=0;i<dataLenght2;i++){
                repartition1Change = repartition1Change + repartition2;

                var val = data[detect][i];
                var xCoords = repartition1Change,
                    yCoords = ((-1)*((val*90)/3))+375-10,
                    r=10; 

                ctx.lineTo( xCoords, yCoords);
                ctx.strokeStyle="#73afa3;";
                ctx.lineWidth = "6";

                //add "a" Element
                var $linkSeries = $("<a>", { class: "link_series transition", href:"#"});
                $(".seriecanvas_wrp").append($linkSeries);
                $linkSeries.css({ left:(xCoords-15)+"px", top:(yCoords-12)+"px"});

                $linkSeries.append( "<span class='name-of-ep'>EP "+(i+1)+"</span>" );
            }

                var my_gradient = ctx.createLinearGradient(0, 0, 0, 380);
                my_gradient.addColorStop(0, "#73afa3");
                my_gradient.addColorStop(1, "#eff8f7");
                ctx.fillStyle = my_gradient;
                ctx.lineJoin = "round";
                ctx.stroke();
                ctx.lineTo(588,380);
                ctx.moveTo(588,380);
                ctx.fill();

        });
    }
}