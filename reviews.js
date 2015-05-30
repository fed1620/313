function loadPage() {
	// Get the references to our buttons
	var ratingButton = document.getElementById("rate");
	var reviewButton = document.getElementById("reviewbutton");

	// By default, both buttons are disabled
	ratingButton.disabled = true;
	reviewButton.disabled = true;

	// Enable the buttons if necessary
	checkReview();
}

function checkStars() {
	var stars = document.getElementsByName("rating");

	// If stars are filled in when the page is loaded, 
	// enable the rating button
	for (var i = 0; i < stars.length; i++) {
		if (stars[i].checked == true) {
			document.getElementById("rate").disabled = false;
			return true;
		}
	}
	return false;
}

function checkReview() {
	var author       = document.getElementById("authortext").value;
	var review       = document.getElementById("writereview").value;
	var reviewButton = document.getElementById("reviewbutton");

	if (checkStars() && author!="" && review!="") {
		reviewButton.disabled = false;
	}
	else {
		reviewButton.disabled = true;
	}
}