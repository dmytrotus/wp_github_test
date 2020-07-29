function saveUserScript(){
	jQuery.ajax({
		type: "POST",                 
		url: my_ajaxurl.ajaxurl,      
		data: {
			action: 'my_ajax_action', 
			login: $login,
			html_url: $html_url,
			email: $email
		},
		success:function( data ) {
			console.log(data)
		},
		error: function(){
			console.log(errorThrown); // error
		}
	});
}