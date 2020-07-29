<?php
/*
Plugin Name: Github API
Description: This plugin allows you to searh github users. Use shortcode [githubCode]
Version: 1.0.0
 */

$tag = 'githubCode';

add_shortcode( $tag , function(){
	return showForm();
});

//ajax call
add_action('wp_footer', 'get_github_users', 99); 
function get_github_users() {
	?>
	<script type="text/javascript" >
	jQuery('#get_github_user').submit(function(e){
		e.preventDefault();
		$username = jQuery(this).find('input[name=username]').val();
		if($username.length)
		{
			jQuery('.spinner-border').toggleClass('d-none');
			jQuery('.submittext').toggleClass('d-none');
			jQuery(document).ready(function($) {
				console.log($username);	
				url = 'https://api.github.com/search/users?q=' + $username;
				jQuery.get( url, function(response) {
					console.log(response);
					jQuery('.spinner-border').toggleClass('d-none');
					jQuery('.submittext').toggleClass('d-none');

				});
			});
		}
	})
	</script>
	<?php
}
//ajax call

function showForm(){
	$form .= '<h3 class="text-center">Search github users</h3>';
	$form .= '<div class="mx-auto col-sm-8 col-md-3 hide-sm">';
	$form .= '<form id="get_github_user"><div class="form-group text-center">';
	$form .= '<label for="username">Username</label>';
	$form .= '<input type="text" name="username" class="form-control" id="username">';
	$form .= '</div>';
	$form .= '<button type="submit" class="my-3 p-3 w-100 btn btn-success">
	<div class="spinner-border d-none" role="status"></div><span class="submittext">Submit</span></button>';
	$form .= '</form></div>';
	return $form;
}