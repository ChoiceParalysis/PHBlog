

<ul class="list-group">



	
	<?php foreach($posts as $post) : ?> 
		<?php echo "<li class=\"list-group-item\"><a href=\"single.php?id={$post->id}\">{$post->title}</a></li>"; ?>
	<?php endforeach; ?> 
	


</ul><!-- end list-group -->