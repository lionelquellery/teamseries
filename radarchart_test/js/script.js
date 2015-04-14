// Canvas season & canvas episodes
var canvas_season  = document.getElementById('canvas_season'),
	canvas_episode  = document.getElementById('canvas_episode'),
	context_season = canvas_season.getContext('2d');
	context_episode = canvas_episode.getContext('2d');


// Datas : season
var data_episode = [];

//fct qui renvoie un tableau, qui lui renvoie un tableau de coordonnées d'elements
function Data(name,popularity)
{
	this.name = name; // nom de l'épisode
	this.popularity = popularity;
}
document.write("Pour une série (x), les scores des épisodes compris dans l'API sont : ");

var ep = 20; // ep = le nombre d'épisodes à récupérer dans l'API
var valEp = // valEp = les valeurs à récupérer dans l'API, ici on invente 'ep=20' valeurs
[30, 24, 25, 25, 28, 23, 30, 21, 30, 20 ];
	for(var k= 0; k < valEp.length; k++)
	{
	     document.write(valEp[k]+", ");
			data_episode.push(new Data("Episode "+ k,valEp[k])); // valEp = entrer la valeur coorespondant
	};
console.log(data_episode);

document.write("Il y a"+k+ "épisodes");



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
		x      = Math.sin( val ), // Sinus
		y      = Math.cos( val ), // Cosinus
		radius = episode.popularity * 10; // Radius depending on popularity

	// Line
	context_episode.lineTo( x * radius + center, y * radius + center );

	// create html div for each element
	function addElement() {
		var divEp = document.createElement("div");

	}
	// add this element into DOM

}

// Close shape
context_episode.closePath();

// Fill
context_episode.fill();


// ............................................................................ //
// ............................................................................ //

// Datas : season
var data_seasons = [];

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

