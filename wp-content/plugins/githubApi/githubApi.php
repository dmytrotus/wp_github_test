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


function showForm(){

	$form .= '<div class="mx-auto col-sm-8 col-md-3 hide-sm">';
	$form .= '<form><div class="form-group text-center">';
	$form .= '<label for="username">Username</label>';
	$form .= '<input type="text" class="form-control" id="username">';
	$form .= '</div>';
	$form .= '<button type="submit" class="my-3 p-3 w-100 btn btn-success">Submit</button>';
	$form .= '</form></div>';
	return $form;
}