$(document).ready(function(){
	main_message = "Get yourself a Nigerian Name! Let NameTag make you Nigerian in a fun way. <br>Simply enter your name and gender below.";
	$("form").submit(function (event) {
		event.preventDefault();
		$("#message").html("<img style='width:75px;height:75px;' src='img/loading.gif' alt='Loading...'>");
		$("#submit_button").prop('disabled', true);
		var formData = {
            'name' : $('input[name=name]').val(),
            'gender' : $('select[name=gender]').val(),
            'token' : $('input[name=token]').val()
        };
	$.post({
		url: 'app/app.php',
		data: formData,
		success: function(data){
		$("#submit_button").prop('disabled', false);
		$("#another_one").show();
		$("form").hide();
		switch(data.status) {
			case (1):
				$("#message").html("Hey " + data.input + ", your Nigerian name is <span class='name-text'>" + data.first_name + 
					"</span> and you are from the <span class='name-text'>" + data.last_name + "</span> family of the " + data.tribe +" tribe of Nigeria! <br><em>"
					+ data.salutation + "!</em>");
				break;
			case (0):
				$("#message").html("Failed.");
				break;
			default:
				$("#message").html("Error. Please Retry");
		}
		}
	})

	});

	$("#another_one").click(function(){
		$("#message").html(main_message);
		$("#another_one").hide();
		$("form").show();
		$('input[name=name]').val([]);
	});

});