<?php namespace ProcessWire;

/**
 * ProcessWire Bootstrap API Ready
 * ===============================
 * This ready.php file is called during ProcessWire bootstrap initialization process.
 * This occurs after the current page has been determined and the API is fully ready
 * to use, but before the current page has started rendering. This file receives a
 * copy of all ProcessWire API variables. This file is an idea place for adding your
 * own hook methods.
 *
 */

/** @var ProcessWire $wire */

/**
 * Example of a custom hook method
 *
 * This hook adds a “numPosts” method to pages using template “category”.
 * The return value is the quantity of posts in category.
 *
 * Usage:
 * ~~~~~
 * $numPosts = $page->numPosts(); // returns integer
 * numPosts = $page->numPosts(true); // returns string like "5 posts"
 * ~~~~~
 *
 */
$wire->addHook('Page(template=blog-category)::numPosts', function($event) {
	/** @var Page $page */
	$page = $event->object;

	// only category pages have numPosts
	if($page->template != 'blog-category') return;

	// find number of posts
	$numPosts = $event->pages->count("template=blog-post, categories=$page");

	if($event->arguments(0) === true) {
		// if true argument was specified, format it as a "5 posts" type string
		$numPosts = sprintf(_n('%d post', '%d posts', $numPosts), $numPosts);
	}

	$event->return = $numPosts;
});

// Hook to Minify HTML
$wire->addHookAfter('Page::render', function($event) {
if(page()->template == 'admin') return;
if( pages('options')->select_options->get("name=minify-html") ) {
	$value = $event->return;
	// https://datayze.com/howto/minify-html-with-php.php
	$event->return = preg_replace('/\s+/', ' ', $value);
}
});

// Hook Admin Custom CSS
$wire->addHookAfter('Page::render', function($event) {
	if(page()->template != 'admin') return;
// Return Content
	$value  = $event->return;
	$templates = urls()->templates;
	$style = "<link rel='stylesheet' href='{$templates}assets/css/admin.css'>";
	$event->return = str_replace("</head>", "\n\t$style</head>", $value);
});

// Remove unnecessary Categories and Tags
$wire->addHook('Pages::save', function($event) {
$page = $event->arguments('page');
if($page->template != 'options' || $page->checkbox == 0) return;
// Disable the check box after saving the page ( you do not need it the next time you edit the options page )
$page->setAndSave('checkbox', 0);
// Categories
$cat_pages = '';
foreach (pages()->get("template=blog-categories")->children as $category) {
	if(!$category->references->count()) {
		$cat_pages .= $category->title . ' , ';
		$category->trash();
	}
}
// Tags
// $tag_pages = '';
// foreach (pages()->get("template=blog-tags")->children as $tag) {
// 	if(!$tag->references->count()) {
// 		$tag_pages .= $tag->title . ' , ';
// 		$tag->trash();
// 	}
// }

if( $cat_pages ) {
	$event->return = $this->message(__('You have removed the unnecessary Categories: ') . ' ' . $cat_pages);
}

// if( $tag_pages ) {
// 	$event->return = $this->message(__('You have removed the unnecessary Tags: ') . ' ' . $tag_pages);
// }

if( $cat_pages == '' && $tag_pages == '' ) {
	// $event->return = $this->message(__('No pages found in Categories and Tags to be moved to trash'));
	$event->return = $this->message(__('No pages found in Categories to be moved to trash'));
}

});
