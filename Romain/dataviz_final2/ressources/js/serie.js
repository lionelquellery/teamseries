function getData(param) {
$.getJSON( "http://localhost:8888/dataviz_final2/api_php/search/"+param, function( data ) {
    init(data);
});

function init(data) { 

    var canvas = document.getElementById("seriecanvas"),
           ctx = canvas.getContext("2d"),
         width = canvas.width,
        height = canvas.height,
    dataLenght = data.length;



    function serie(){

           var dataLenghtz = data.length,
              repartition1 = width / dataLenghtz,
        repartition1Change = (-0.5) * (repartition1);

        //begin drawing : point 0:0
        ctx.beginPath();
        ctx.moveTo(0,380);


        for(i=0;i<dataLenght;i++){

            
            var count = 0;


            for(x = 0; x <data[i].length; x++) 
            { 
                count += data[i][x];
            }
            repartition1Change = repartition1Change + repartition1;

            // x & y coords.
            var xCoords = repartition1Change,
                yCoords = ((-1) * ((count * 10)/4.5)) + 375 - 10,
                r=20;

            ctx.lineTo( xCoords, yCoords);
            ctx.strokeStyle = "#cb4460";
              ctx.lineWidth = "6";

            //gradient
            var my_gradient = ctx.createLinearGradient(0, 0, 0, 380);
            my_gradient.addColorStop(0, "#eec1cb");
            my_gradient.addColorStop(1, "#faecef");
            ctx.fillStyle = my_gradient;


            $('input').click(function(){
                var inputName = $(this).attr('name');
                inputName = inputName -1;
            });
            //add "a" Element
            var $linkSeries = $("<a>", { class: "link_series transition", href:"#", "data-season" : i, onclick:"$('input').prop('tagName')"});
            $(".seriecanvas_wrp").append($linkSeries);
            $linkSeries.css({ left:(xCoords-10)+"px", top:(yCoords-13)+"px"});
            // PROPORTIONAL POINTS = CHANGE DE CSS INTO ".link_series:after{display:none; .link_series: all comment actived}"
            // $linkSeries.css({ left:(xCoords-12)+"px", top:(yCoords-19)+"px", width:10+(1/yCoords)*1000+"px", height:10+(1/yCoords)*1000+"px", background:'white', border: 'solid 3px #cb4460', borderRadius:"1000px"});
        }
        //draw canvas
        ctx.lineJoin = "round";
        ctx.stroke();
        ctx.lineTo(569,380);
        ctx.moveTo(569,380);
        ctx.fill();

        // on click : prevent default
        $(".seriecanvas_wrp a").click(function(e){
            e.preventDefault();

            var $this = $(this),
               season = $this.data('season');
               console.log(season);

        });
    }
    serie();



    $('input').click(function(){
        var inputName = $(this).attr('name');
        inputName = inputName -1;

        $(canvas).stop().animate({opacity: 0}, 0).delay(800).animate({opacity: 1}, 700);
                                            
        ctx.clearRect ( 0 , 0 , width, height );
        $('.seriecanvas_wrp a').remove();
        
        if(inputName === -1)
        {
            serie();
        }
        else{
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
                ctx.strokeStyle="#cb4460)";
                ctx.lineWidth = "6";

                //add "a" Element
                var $linkSeries = $("<a>", { class: "link_series transition", href:"#"});
                $(".seriecanvas_wrp").append($linkSeries);
                $linkSeries.css({ left:(xCoords-10)+"px", top:(yCoords-13)+"px"});
            }

            var my_gradient = ctx.createLinearGradient(0, 0, 0, 380);
            my_gradient.addColorStop(0, "#eec1cb");
            my_gradient.addColorStop(1, "#faecef");
            ctx.fillStyle = my_gradient;
            ctx.lineJoin = "round";
            ctx.stroke();
            ctx.lineTo(588,380);
            ctx.moveTo(588,380);
            ctx.fill();
        }
    });
}
}
