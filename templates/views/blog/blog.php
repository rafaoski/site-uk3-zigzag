<?php namespace ProcessWire;
// This is the template file for main /blog/ page that lists blog post summaries.
// If there are more than 10 posts, it also paginates them.
?>

<div id='content-body'>
	<?php
	$posts = page()->children('limit=12');
	echo ukBlogPosts($posts, ['bgImage' => true, 'paginate' => true]);
	?>
</div>

<aside id='sidebar'>
	<?php
	$categories = pages()->get("template=blog-categories");
	echo ukNav($categories->children, [ 'header' => $categories->title ]);
	?>
</aside>
