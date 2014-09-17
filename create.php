<?php

use Acme\App;

require 'blog.php';

$data = array();

view('create');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$data['title'] = (isset($_POST['title'])) ? htmlspecialchars($_POST['title']) : false;
	$data['body'] = (isset($_POST['body'])) ? htmlspecialchars($_POST['body']) : false;

	if ($postRepository->create($data)) {
		echo 'Posted successfuly!';
	}
}