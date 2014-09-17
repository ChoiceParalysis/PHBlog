<?php

require 'config.php';

function view($view, $posts = NULL)
{	
	
	$path = 'views/' . $view . '.view.php';
	if ( file_exists($path) ) {
		include 'views/master.view.php';
	} else {
		throw new Exception('The view ' . $view .' does not exist.');
	}
}