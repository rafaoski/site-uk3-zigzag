<?php namespace ProcessWire;

// get most recent blog post
$blog = pages()->get("template=blog");
$blogPost = $blog->child();
?>

<div class='uk-margin-top' id='content-body'>
	<?=page()->body?>
	<hr>
	<h3 class='uk-heading-hero uk-text-center uk-margin-large-top'>
		<?=setting('in-blog')?>
	</h3>
	<?= str_replace('uk-light', 'uk-dark', ukBlogPost($blogPost));?>
	<p class='uk-text-center uk-light'>
		<a class='uk-button uk-button-text uk-text-large' href='<?=$blog->url?>'>
			<?=ukIcon('arrow-right')?>
			<?=setting('more-blog')?>
		</a>
	</p>
</div>

<!-- <aside id='sidebar'>
	<?php
	// $categories = pages()->get("template=blog-categories");
	// echo ukNav($categories->children, [ 'header' => $categories->title ]);
	?>
	<div class='uk-card uk-card-default uk-card-hover uk-card-body uk-margin-medium-top'>
		<?php // echo page()->sidebar?>
	</div>
</aside> -->
