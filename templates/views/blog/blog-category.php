<?php namespace ProcessWire; ?>

<div id='content'>
	<?php
	echo ukHeading1(page()->title, 'divider');
	$posts = pages()->get("template=blog")->children("categories=$page, limit=12");
	echo ukBlogPosts($posts, ['bgImage' => true]);
	?>
</div>

<aside id='sidebar'>
	<?php
	$categories = page()->parent;
	echo ukNav($categories->children, [ 'header' => $categories->title ]);
	?>
</aside>
