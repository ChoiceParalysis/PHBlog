<?php

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;

use Acme\App;

require 'blog.php';

$post = $postRepository->find($id);

if ($post) {
	view('single', $post);
}