function getData(t){$.getJSON("http://localhost/dataviz/api_php/search/"+t,function(t){init(t)})}function init(t){function a(){var e=t.length,a=h/e,n=-.5*a;for(i=0;o>i;i++){var c=0;for(x=0;x<t[i].length;x++)c+=t[i][x];n+=a,r.beginPath(),r.arc(n,-1*(10*c/2.2)+490,10,0,2*Math.PI),r.stroke()}}var n=document.getElementById("seriecanvas"),r=n.getContext("2d"),h=n.width,c=n.height,o=t.length;a(),$("input").click(function(){var n=$(this).attr("name");if(n-=1,r.clearRect(0,0,h,c),-1===n)a();else for(e=0;o>e;e++){var g=t[n].length,f=h/g,l=-.5*f;for(i=0;g>i;i++){l+=f;var s=t[n][i];r.beginPath(),r.arc(l,-1*(100*s/2.2)+490,10,0,2*Math.PI),r.stroke()}}})}