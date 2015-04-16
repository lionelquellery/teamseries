function getData(param) {
$.getJSON( "http://127.0.0.1/dataviz/api_php/search/"+param, function( data ) {
    init(data);
});

function init(data) {

    var canvas = document.getElementById("seriecanvas"),
           ctx = canvas.getContext("2d"),
         width = canvas.width,
        height = canvas.height,
    dataLenght = data.length,
        hauteur = 0;

    function divise_canvas(){
        ctx.beginPath();
        for(h = 0; h < 10; h++){
            var hauteur = (height/10) + hauteur;
            ctx.stroke();
            ctx.strokeStyle = "#000000";
            ctx.lineWidth = "1";
            ctx.moveTo(hauteur,0);
            ctx.lineTo(hauteur,500);
            ctx.fill();
        }
    }


    function serie(){

           var dataLenghtz = data.length,
              repartition1 = width / dataLenghtz,
        repartition1Change = (-0.5) * (repartition1);

        //begin drawing : point 0:0
        ctx.beginPath();
        ctx.moveTo(20,400);


        for(i=0;i<dataLenght;i++){

            var count = 0;


            for(x = 0; x <data[i].length; x++) 
            { 
                count += data[i][x];
            }
            repartition1Change = repartition1Change + repartition1;

            // x & y coords.
            var xCoords = repartition1Change,
                yCoords = ((-1) * ((count * 10)/5)) + 375 - 10,
                r=20;
                

            ctx.lineTo( xCoords, yCoords);
            ctx.strokeStyle = "#4397cc";
              ctx.lineWidth = "5";

            //gradient
            var my_gradient = ctx.createLinearGradient(0, 0, 0, yCoords);
            my_gradient.addColorStop(0, "#a6bfce");
            my_gradient.addColorStop(1, "#fff");
            ctx.fillStyle = my_gradient;

            //add "a" Element
            var $linkSeries = $("<a>", { class: "link_series transition", href:"#", "data-season" : i});
            $(".seriecanvas_wrp").append($linkSeries);
            $linkSeries.css({ left:(xCoords-11)+"px", top:(yCoords-13)+"px"});



            //prevent default
            $(".seriecanvas_wrp a").on('click',function(e){
                e.preventDefault();

                var $this = $(this),
                   season = $this.data('season');
                   // console.log($('input').eq(i));

            });
        }
        //draw canvas
        ctx.lineJoin = "round";
        ctx.stroke();
        ctx.lineTo(570,380);
        ctx.moveTo(570,380);
        ctx.fill();

    }
    serie();



    $('ul li input').click(function(){
        var inputName = $(this).attr('name');
        inputName = inputName -1;
        
        ctx.clearRect ( 0 , 0 , width, height );
        divise_canvas();
        $('.seriecanvas_wrp a').remove();
        
        if(inputName === -1)
        {
            serie();
        }
        else{
            ctx.beginPath();
            ctx.moveTo(5,400);

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
                ctx.strokeStyle="#a6bfce)";
                ctx.lineWidth = "5";

                //add "a" Element
                var $linkSeries = $("<a>", { class: "link_series transition", href:"#"});
                $(".seriecanvas_wrp").append($linkSeries);
                $linkSeries.css({ left:(xCoords-11)+"px", top:(yCoords-13)+"px"});
            }

            var my_gradient = ctx.createLinearGradient(0, 0, 0, 380);
            my_gradient.addColorStop(0, "#4397cc");
            my_gradient.addColorStop(1, "#ffffff");
            ctx.fillStyle = my_gradient;
            ctx.lineJoin = "round";
            ctx.stroke();
            ctx.lineTo(610,380);
            ctx.moveTo(610,380);
            ctx.fill();
        }
    });
}
}