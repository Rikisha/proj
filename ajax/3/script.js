	var request = new XMLHttpRequest();
	request.open("GET","data.txt");
	request.onreadystatechange = function(){
		if(request.status ===200 && request.readyState===4){
			document.getElementsByTagName("li")[1].innerHTML = request.responseText;
			console.log(request);
		}
	}
	request.send();

	
	