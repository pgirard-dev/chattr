/** post a message to the database in ajax **/
jQuery.postMessage = function postMessage() {
	try {
		// get the hashtag without the "#"
		var hashtag = $("#hashtag").val().replace("#","");
		// write the data
		var data = "message=" + $("#message").val();
		// form the good url
		var url = "controllers/postMessage.php" + "?hashtag=" + hashtag;
		// post the message to the database in AJAX
		$.ajax({
			url: url,
			type: "POST",
			data: data,
			datatype: "json",
			
			
		}).success( function (request){
			// success
			console.log(request);
		});
	}
	catch(Exception){
		// essentially when there is no value in message input
		console.log("message is empty");
	}
}
	
