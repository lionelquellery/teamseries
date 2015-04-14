$.getJSON( "data.json", function( data ) {
    init(data);
});

function init(data) {
    //génération tableau par rapport au series
    var canvas = document.getElementById("seriecanvas");
    var ctx = canvas.getContext("2d");
    var width = canvas.width;
    var height = canvas.height;
    var dataLenght = data.length;
    
    function serie(){
        
            var dataLenghtz = data.length;
            var repart = width / dataLenghtz;
            var repartchange = (-0.5)*(repart);
        
        for(i=0;i<dataLenght;i++){
        
            var count = 0;
            for(x = 0; x <data[i].length; x++) 
            { 
                count += data[i][x];
            }
            
        repartchange = repartchange + repart;
        ctx.beginPath();
        ctx.arc(repartchange,((-1)*((count*10)/2.2))+490,10,0,2*Math.PI);
        ctx.stroke();
        }
    }
    
    serie();
    
    $('input').click(function(){
    var s_id = $(this).attr('name');
        s_id = s_id -1;
        
        ctx.clearRect ( 0 , 0 , width, height );
        
        if(s_id === -1)
        {
            serie();
        }
        else{
            
            for(e = 0; e < dataLenght; e++){

                var dataLenghte = data[s_id].length;
                var reparte = (width) / dataLenghte;
                var repartchange = (-0.5)*(reparte);
    
                for(i=0;i<dataLenghte;i++){
                    repartchange = repartchange + reparte;
                    var val = data[s_id][i];
                    ctx.beginPath();
                    ctx.arc(repartchange,((-1)*((val*100)/2.2))+490,10,0,2*Math.PI);
                    ctx.stroke();
                }                
            }
        }
    });
}

