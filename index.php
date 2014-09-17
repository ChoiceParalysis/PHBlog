<?php

use Acme\App;

require 'blog.php';



$posts = $postRepository->all();

view('index', $posts);



	

	