var w = 780,
  h = 350,
  vis = null,
  g,
  current,
  duration = 700,
  ease = "elastic",
  obj,
  reset = [],
  id;

function draw(id,data) {
	var margin = 40,
		y = d3.scale.linear().domain([0, d3.max(data)]).range([0 + margin, h - 60]),
		x = d3.scale.linear().domain([0, data.length]).range([0 + margin, w + 50]),
	    line = d3.svg.line()
			  .x(function(d,i) { return x(i); })
			  .y(function(d,i) { return -1 * y(d); });

	var vis = d3.select(id).select("svg").select("g");
	
	if (vis.empty()) {
		vis = d3.select(id)
		  .append("svg:svg")
		  .attr("width", w)
		  .attr("height", h);
        
			
		g = vis.append("svg:g")
		  .attr("transform", "translate(0, 350)");

		g.append("svg:line")
		  .attr("x1", x(0))
		  .attr("y1", -1 * y(0))
		  .attr("x2", x(w))
		  .attr("y2", -1 * y(0))

		g.append("svg:line")
		  
		  .attr("y1", -1 * y(0))
		  .attr("y2", y(h))
		  .attr("y2", -1 * y(0))


		 // g.append("svg:line")
		 //  .attr("x1",x(h))
		 //  .attr("y1",-11000 *y(9))

		g.selectAll(".xLabel")
		  .data(x.ticks(12))
		  .enter().append("svg:text")
		  .attr("class", "xLabel")
		  .text(String)
		  .attr("x", function(d) { return x(d-1) })
		  .attr("y", 0)
		  .attr("text-anchor", "middle");
	}
			
	g.append("svg:path")
		.attr("class", id)
		.attr("d", line(reset))
		.transition().duration(duration).ease(ease)
		.attr("d", line(data));
						
	g.selectAll("dot")
		.data(data)
		.enter().append("circle")
		.attr("class", id)
		.attr("r", 6.5)
		.attr("cx", function(d,i) { return x(i); })
		.attr("cy", 0)
		.transition().duration(duration).ease(ease)
		.attr("cy", function(d) { return -1 * y(d); })
		.attr("title", function(d,i) { return x(i); });
			
		current = id;
		console.log("current = "+current, "data = "+data);
	
	
	$('svg circle').tipsy({
		gravity: 's', 
		html: true,
        fade: true,
        opacity: 0.95,
		title: function() {
		var d = this.__data__;
		var pDate = d.date;
		pDate = data.length;


	
		return 'Saison: ' + data; 
		}
	});
}

function removeData(id) {
	d3.selectAll("circle."+id)
		.transition().duration(duration).ease(ease)
		.attr("cy", 0)
		.attr("r", 0)
		.remove();
	d3.selectAll("path."+id).remove();
}

function generateData(id) {

	var data = [];

	d3.json("../js/data.json", function(error, json,data) {
 		if (error)
 			return console.warn(error);

	 	data = json;
	 	data = data[0];
	 	obj = data;
 	
	 	console.log(data);
	  	console.log(data);

	  	draw(id,data);

	});

	
}




function pageInit() {
	generateData('#entity-chart');
}

$(document).ready( function() {
	pageInit();
});
