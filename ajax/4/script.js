var request = new XMLHttpRequest();
request.open("GET", "data.xml");
request.onreadystatechange = function(){
	if(request.status === 200 && request.readyState == 4){
		console.log(request.responseXML);
		var names = request.responseXML.getElementsByTagName("name");
		var list ="<ul>"
		for(var i =0; i < names.length; i++){
			 list = list + "<li>" + names[i].innerHTML + "</li>"
		}
		var list = list + "</ul>"
		document.getElementById("update").innerHTML = list
	}
}
request.send();
