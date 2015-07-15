$("#search").keyup(function(){
	var searchField = $("#search").val();
	var exp = new RegExp(searchField, "i");
	$.getJSON("data.json", function(data){
		var output = "<ul class='searchresults'>";
		$.each(data, function(key, value){
			if((value.name.search(exp) !==-1) || (value.bio.search(exp) !==-1)){
				output = output + "<li>" + "<h2>" + value.name + "</h2>"; 
				output = output + "<img src = images/" + value.shortname + "_tn.jpg>";
				output = output + "<p>" + value.bio + "</p>"
				output = output + "</li>";
			}
	})

	output = output + "</ul>"
	$("#update").html(output);
	})
});
