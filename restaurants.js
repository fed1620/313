function checkSearchBar() {
	// Get the references to the text input and the search button
	var searchInput  = document.getElementById("searchinput").value;
	var searchButton = document.getElementById("searchbutton");

	// The search button will only be active if there is input in the text box
	if (searchInput == "") {
		searchButton.disabled = true;
	}
	else {
		searchButton.disabled = false;
	}
}