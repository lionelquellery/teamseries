$.ajax({
	url: 'http://api.themoviedb.org/3/tv/".$key_series."/season/".$x.$key',
	type: 'get',
	dataType: 'json',
	data: {param1: 'value1'},
})
.done(function() {
	console.log("success");
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});
