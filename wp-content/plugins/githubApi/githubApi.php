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
		jQuery('.messages').children().addClass('d-none');
		if($username.length)
		{
			jQuery('.spinner-border').toggleClass('d-none');
			jQuery('.submittext').toggleClass('d-none');
			jQuery(document).ready(function($) {
				url = 'https://api.github.com/search/users?q=' + $username;
				jQuery.get( url, function(response) {
					if(response.total_count == 0){
						jQuery('.user-doesnt-exist').removeClass('d-none');
					}else if(response.total_count == 1){
						
						$login = response.items[0].login;
						$html_url = response.items[0].html_url;
						$email = response.items[0].html_url;

						saveUserScript($login, $html_url, $email);

						jQuery('.user-saved').removeClass('d-none');
						console.log(response)
					}else{
						jQuery('.users-too-much').removeClass('d-none');
					}
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


//actions ajax request
wp_enqueue_script( 'save_user_script', plugin_dir_url( __FILE__ ) . 'js/saveUser.js', array('jquery'));
wp_localize_script('save_user_script', 'my_ajaxurl', array(
	'ajaxurl' => admin_url('admin-ajax.php'),
));
add_action('wp_ajax_my_ajax_action', 'saveUser' );
add_action('wp_ajax_nopriv_my_ajax_action', 'saveUser' );
//actions ajax request


//save user
function saveUser(){
		$user_email = $_POST['email'] ;
		$user_name =  $_POST['login'] ;
		$random_password = wp_generate_password( 12 );

		$user_id = wp_create_user( $user_name, $random_password, $user_email );
		if ( is_wp_error( $user_id ) ) {
			echo $user_id->get_error_message();
		}
		else {
			echo 'User Saved';
		}

		wp_insert_user( $userdata );
		$userdata = array(
			'ID'              => $user_id, 
			'role'            => 'Contributor' ,
			'html_url'		  => $_POST['html_url'] ,
		);

		wp_die(); // required. to end AJAX request.

};
//save user


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

	$result .= '<div class="container">';
	$result .= '<div class="messages">';
	$result .= '<h3 class="user-doesnt-exist d-none">Użytkownik nie istnieje</h3>';
	$result .= '<h3 class="users-too-much d-none">Użytkowników jest więcej niż 1</h3>';
	$result .= '<h3 class="user-saved d-none">Użytkownik jest zapisany do bazy danych</h3>';
	$result .= '</div>';
	$result .= '</div>';

	return $form.$result;
}