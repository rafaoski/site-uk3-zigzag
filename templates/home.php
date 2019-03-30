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
	<p class='uk-text-center'>
		<a class='uk-button uk-button-text uk-text-large' href='<?=$blog->url?>'>
			<?=ukIcon('arrow-right')?>
			<?=setting('more-blog')?>
		</a>
	</p>

	<?php // IF Enable Home Page Sections
	if(setting('enable-sections')) :
	// Sections
	$sections = [
		'about',
		'services',
		'portfolios',
		'team',
		'info',
		'testimonials',
		'subscribe'
	];
	// Start Sections Loop
	foreach ($sections as $key => $section): ?>
	<section id='section-<?= $key ?>' class='section-<?= $section ?> uk-margin-small-top uk-margin-small-bottom'>

		<h3 class="uk-h1 uk-text-uppercase uk-heading-bullet uk-margin" style="font-family: 'Roboto', sans-serif;">
			<?= $section ?>
		</h3>

	<?php // https://processwire.com/api/ref/wire-file-tools/render/
	echo $files->render("views/home-sections/$section"); ?>

	<!-- SECTION LINKS -->
	<div class="uk-flex uk-flex-center uk-margin section-links">
	<?php if ($key != count($sections) -1): ?>
		<a href="#section-<?= $key+1 ?>" title="Next Item"
			 class="hover uk-text-warning uk-button uk-button-text uk-padding-small"
			 style="border: none; color: hsla(0, 2%, 58%, 0.94);" uk-scroll>
			 <span style='transform: rotate(90deg);' data-uk-icon="icon: chevron-double-right; ratio: 2.5"></span>
		</a>
	<?php endif;?>
		<a href="#" title="Show Items" uk-icon="icon: arrow-right; ratio: 2.5"
			 class="hover uk-text-warning uk-button uk-button-text uk-padding-small">
	  </a>
	</div><!-- /SECTION LINKS -->

	</section>
	<?php
	endforeach;
	endif;
	?>

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
