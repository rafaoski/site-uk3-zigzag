<?php namespace ProcessWire; ?>

<div class='uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-large-bottom' pw-append='content' data-uk-grid>
	<?php foreach(page()->children as $category): ?>
	<a class='uk-link-reset not-hover' href='<?=$category->url?>'>
		<div class='uk-card uk-card-default uk-card-hover uk-card-body' style='border: 1px solid #b3b3b378'>
			<h3 class='uk-card-title uk-margin-remove'><?=$category->title?></h3>
			<span class='uk-text-muted'><?=$category->numPosts(true)?></span>
		</div>
	</a>
	<?php endforeach; ?>
</div>

<aside id='sidebar'>
	<?=ukNav(pages()->get("template=blog")->children('limit=3'), [ 'header' => setting('recent-posts') ])?>
</aside>
