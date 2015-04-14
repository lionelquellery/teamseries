// document.write("");

// Canvas season & canvas episodes
var canvas_season  = document.getElementById('canvas_season'),
	canvas_episode  = document.getElementById('canvas_episode'),
	context_season = canvas_season.getContext('2d');
	context_episode = canvas_episode.getContext('2d');

// Datas :
var data_episode = [],
	data_seasons = [];

// ................................. //

// Datas : episode

//fct qui renvoie un tableau associatif
function Data(name,popularity)
{
	this.name = name; // nom de l'épisode
	this.popularity = popularity;
}


var valEp = // valEp = les scores des épisodes from API. 
[30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25, 30, 25 ];
	for(var k= 0; k < valEp.length; k++)
	{
	     document.write(valEp[k]+", ");
			data_episode.push(new Data("Episode "+ k,valEp[k])); // k = nombre d'épisodes par saison
	};
console.log(data_episode);

document.write("Il y a "+k+ " épisodes.<br/><br/>");



// Start filling
context_episode.fillStyle = '#00A9B2';
context_episode.beginPath();


// Center of canvas
var center = 300;

// Iterate through each episode
for(var i = 0; i < data_episode.length; i++)
{
	var episode = data_episode[i], // Get episode
		val    = ( i / data_episode.length ) * Math.PI * 2,
		valX      = Math.sin( val ), // Sinus
		valY      = Math.cos( val ), // Cosinus
		radius = episode.popularity * 10; // Radius depending on popularity
	// Line
	context_episode.lineTo( valX * radius + center, valY * radius + center );

	document.write("<br/>"+(valX * radius + center)+"<br/> et "+(valY * radius + center)+"<br/>");
	
	var $point = $("<a>", { class: "points", href:"#"});
		$(".canvas_wrapper").append($point);
		// $point.css({  left:(valX * radius + center), top:(valX * radius + center)  });
		$point.css({  left:300+(valX*radius)+"px", top:300+(valY*radius)+"px" });
	//create html div and print it in the DOM
	// var $point = $("<a href='#' class='points'></a>");
	// 	$("#canvas_episode").append($point);
	// 	//add css properties
	// 	$point.css({left:valX * radius + center, top:valX * radius + center});


	// $('#canvas_episode').append($('<a/>').addClass("points"));
	// $('.points').css({left:valX * radius + center, top:valX * radius + center});

	// 	div = document.getElementById('canvas_episode');
	// newpoint = document.createElement("a");
	// div.appendChild(newpoint);
	// $('newpoint').css({left:valX * radius + center, top:valX * radius + center});

}

// Close shape
context_episode.closePath();

// Fill
context_episode.fill();

// ................................. //

// Datas : season

//fct qui renvoie un tableau associatif

var valSa = // valEp = les scores des saisons from API. 
[30, 24, 25, 25, 28];
	for(var j= 0; j < valSa.length; j++)
	{
	     document.write(valSa[j]+", ");
			data_seasons.push(new Data("Saison "+ j,valSa[j])); // j = nombre d'épisodes par saison
	};
console.log(data_seasons);

document.write("Il y a "+j+ " saisons.<br/><br/>");



// Start filling
context_season.fillStyle = '#1F6266';
context_season.beginPath();

// Center of canvas
var center = 300;

// Iterate through each season
for(var i = 0; i < data_seasons.length; i++)
{
	var season = data_seasons[i], // Get season
		val    = ( i / data_seasons.length ) * Math.PI * 2,
		x      = Math.sin( val ), // Sinus
		y      = Math.cos( val ), // Cosinus
		radius = season.popularity * 10; // Radius depending on popularity

	// Line
	context_season.lineTo( x * radius + center, y * radius + center );
}

// Close shape
context_season.closePath();

// Fill
context_season.fill();



// ............................................................................ //
// ............................................................................ //

