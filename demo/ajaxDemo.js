function handleClick() {
	$.get("myPage.php", {name:"burton"}, function(data){
		// This will happen when I get something back from the server
		// And the variable "data" will hold the data that it returned
		alert("Back from server. Received: " + data);

	});

}