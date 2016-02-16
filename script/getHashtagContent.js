/* get the content for a hashtag */
jQuery.getHashtagContent = function getHashtagContent() {
	// get hashtag without "#"
	var hashtag = $("#hashtag").val().replace("#",""); 
	
	
	// create url 
	var url = "controllers/getHashtagContent.php" + "?hashtag=" + hashtag;
	
	// get message from the database in AJAX
	$.ajax({
		url: url,
		type: "GET",
		datatype: "html",
	}).success( function (html){
		// function to be called on a successful AJAX request
		var initialPosition = ($(window).scrollTop() + $(window).height());
		var userWaitsForNextMsg = (initialPosition == $(document).height()) ? true : false;
		//console.log(userWaitsForNextMsg);
		//console.log("one : " + $("#conversation").height());
		var lastHeight = $("#conversation").height();
		
		$("#conversation").html(html);
		// console.log("two : " + $("#conversation").height());
		var newHeight = $("#conversation").height();
		if($(window).scrollTop() == 0 || ((newHeight > lastHeight) && userWaitsForNextMsg)) {
			$("html, body").animate({ scrollTop:  $("#conversation").height() }, 1000);
		}
			
	});
}	
	
