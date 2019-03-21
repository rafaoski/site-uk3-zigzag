<?php namespace ProcessWire;
// _main.php template file, called after a page’s template file
// Unset Turbolinks
if (user()->isLoggedin() || setting('turbolinks') == null) {
		setting(false, 'turbolinks-js');
}
// GOOGLE WEBMASTER / GOOGLE ANALYTICS
$gWebmaster = setting('gw-code') ? pages('options')->text_1 : '';
$gAnalytics = setting('ga-code') ? pages('options')->text_2 : '';
// IMAGES Get First Image ( https://processwire.com/docs/fields/images/ )
$image = page()->images ? page()->images->first() : '';
$background_size = page()->background_size ? 'contain' : 'cover';
?>
<!DOCTYPE html>
<html lang='<?=setting('lang-code')?>'>
<head id='html-head'>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (setting('favicon')): ?>
<link rel="icon" href="<?=setting('favicon')->url?>" sizes="any" type="image/svg+xml">
<?php endif;
echo page()->seo()->render(); // SeoMaestro https://processwire.com/talk/topic/20817-seomaestro/
echo seoPagination(page()); // Pagination
echo setting('js-files')->each("\n<script src='{value}' defer></script>"); // JS files
echo setting('turbolinks-js'); // Turbolinks
echo setting('css-files')->each("\n<link rel='stylesheet' href='{value}'>\n"); // CSS Files
gwCode($gWebmaster); // Google Webmaster Tools Werification Code
?>
</head>
<body id='html-body' class='<?=setting('body-classes')->implode(' ')?>'>

	<!-- HEADER -->
	<header class='uk-background-muted'>
		<?php if ($image && setting('header-image')): ?>
		<!-- PARALLAX -->
		<div class="uk-inline uk-width-1-1 uk-background-<?=$background_size?>" uk-parallax="bgy: -200"
			   style="background-image: url('<?=$image->url;?>');">
		<div class="uk-overlay-default uk-position-cover"></div>
		<?php endif; ?>

		<?php if (setting('floating-information')): ?>
		<!-- MODAL INFO PANEL -->
		<a class='uk-float-right uk-card uk-card-body' style='position: fixed; right: 0; z-index: 999;'
		   href="#modal-info-close" data-uk-toggle>
			<span uk-icon="icon: question; ratio: 2.5"></span>
		</a>
		<!-- This is the modal with the outside close button -->
		<div id="modal-info-close" data-uk-modal>
			<div class="uk-modal-dialog uk-modal-body">
				<button class="uk-modal-close-default" type="button" data-uk-close></button>
				<?php
					files()->include('inc/contact/_contact-info.php', ['item' => setting('contact-page')]);
				?>
			</div>
		</div><!-- /MODAL INFO PANEL -->
		<?php endif; ?>
		<!-- MASTHEAD -->
		<div id='masthead' class="uk-container <?php if(setting('header-image')) echo 'uk-card'?>">
			<h3 id='masthead-logo' class='uk-text-center uk-margin-medium-top uk-margin-small-bottom'>
				<a class='uk-text-center uk-text-uppercase hover uk-link-reset not-hover' href='<?=urls()->root?>'>
					<img src='<?=setting('logo') ? setting('logo')->url : '';?>' alt='<?=setting('site-name')?>'><br>
					<span class='site-title'><?=setting('site-name')?></span>
				</a>
			</h3>
			<p id='masthead-tagline' class='uk-text-center <?php if(!setting('header-image')) echo 'uk-text-muted'?> uk-h2 uk-margin-small uk-text-uppercase'>
				<?=setting('site-description')?>
			</p>
			<?php if (setting('social-profiles')): ?>
			<ul class="uk-iconnav uk-flex uk-flex-center uk-margin">
				<?=externalLink(pages('options')->external_link,
					[
					'class' => 'external-link',
					'style' => 'padding: 5px; fill: red;',
					'ratio' => 2
					]);
				?>
			</ul>
			<?php endif; ?>
			<nav id='masthead-navbar' class="uk-navbar-container uk-navbar-transparent" data-uk-navbar>
				<div class="uk-navbar-center uk-visible@m">
					<?=ukNavbarNav(setting('home')->and(setting('home')->children), [
						'dropdown' => [ 'basic-page', 'blog-categories' ]
					])?>
				</div>
			</nav>
		</div><!-- /MASTHEAD -->

		<!-- PRIVACY POLICY -->
		<div id='privacy' class='privacy-panel uk-card uk-margin-small-top'>
			<?=privacyPanel(pages()->get("template=basic-privacy"))?>
		</div><!-- /PRIVACY POLICY -->

		<?php if ($image && setting('header-image')): ?>
		</div><!-- /PARALLAX -->
		<?php endif;?>

	</header><!-- HEADER -->

	<!-- MAIN CONTENT -->
	<main id='main' class='uk-container uk-margin uk-margin-large-bottom'>
		<?php if(page()->parent->id > setting('home')->id) echo ukBreadcrumb(page(), [ 'class' => 'uk-visible@m' ]); ?>
		<div class='uk-grid-large' data-uk-grid>
			<div id='content' class='uk-width-expand'>
				<h1 id='content-head' class='uk-margin-small-top'>
					<?=page()->get('headline|title')?>
				</h1>
				<?php if (page('summary')): ?>
					<h2 id='content-summary' class='uk-margin-small-top uk-h4'>
						<?=page()->get('summary')?>
					</h2>
				<?php endif; ?>
				<div id='content-body'>
					<?=page()->body?>
				</div>
			</div>
			<aside id='sidebar' class='uk-width-1-3@m' pw-optional>
				<?=page()->sidebar?>
			</aside>
		</div>
	</main>

	<?php if(config()->debug && user()->isSuperuser()): // display region debugging info ?>
	<section id='debug' class='uk-section uk-background-secondary'>
		<h3 class='uk-text-uppercase uk-text-center uk-text-warning'>
			<?=setting('debug-regions')?>
		</h3>
		<div class='uk-background-secondary'>
			<!--PW-REGION-DEBUG-->
		</div>
	</section>
	<?php endif; ?>

	<?php if(setting('languages')):?>
	 <!-- LANG MENU -->
	 <div id='lang-menu' class='uk-card uk-flex uk-flex-center'>
			 <ul class='uk-navbar-nav'>
				 <?=langMenu(page(),setting('home'));?>
			 </ul>
	 </div><!-- /LANG MENU -->
	 <?php endif; ?>
	 
	<!-- FOOTER -->
	<footer class='uk-section uk-background-muted'>
		<div id='footer' class='uk-container'>
			<!-- GRID -->
			<div data-uk-grid>

				<!-- SEARCH FORM -->
				<div class='uk-width-1-4@m uk-flex-last@m uk-text-center'>
					<form class='uk-search uk-search-default' action='<?=pages()->get('template=basic-search')->url?>' method='get'>
						<button class='uk-button uk-button-text uk-text-large uk-text-warning' type='submit' aria-hidden="true">
							<?=ukIcon('search', ['ratio' => 2])?>
						</button>
						<label class='uk-text-large' for="search-query">
							<?=setting('search-placeholder')?>
						</label>
						<input type='search' id='search-query' name='q' class='uk-search-input'>
					</form>
				</div><!-- /SEARCH FORM -->

				<!-- COPYRIGHT -->
				<div class='uk-width-2-3@m uk-flex-first@m uk-text-center uk-text-left@m'>
					<h3 class='uk-margin-remove'>
						<a href="<?=setting('home')->url?>" class='uk-text-uppercase'>
							<?=setting('site-name')?>
						</a>
						<small class='uk-text-small uk-text-muted'><?=setting('site-description')?></small>
					</h3>
					<p class='uk-margin-remove'>
						<small class='uk-text-small uk-text-muted'>&copy; <?=date('Y')?> &bull;</small>
						<a href='<?=pages('options')->copyright->url_1?>'>
							<?=pages('options')->copyright->text_1?>
						</a>
					</p>
				</div><!-- /COPYRIGHT -->

			</div><!-- /GRID -->
		</div><!-- #footer -->
	</footer><!-- FOOTER -->

	<!-- OFFCANVAS NAV TOGGLE -->
	<a id='offcanvas-toggle' aria-label="<?=__('mobile-nav');?>" class='uk-hidden@m' href="#offcanvas-nav" data-uk-toggle>
		<?=ukIcon('menu', 1.3)?>
	</a>

	<!-- OFFCANVAS NAVIGATION -->
	<div id="offcanvas-nav" data-uk-offcanvas>
		<div class="uk-offcanvas-bar">
			<h3><a class='uk-button uk-button-text uk-text-large' href='<?=setting('home')->url?>'>
			<?=setting('site-name')?></a></h3>
			<?php
			// offcanvas navigation
			// example of caching generated markup (for 600 seconds/10 minutes)
			echo cache()->get('offcanvas-nav', 10, function() {
				return ukNav(pages()->get('/')->children(), [
					'depth' => 1,
					'accordion' => true,
					'blockParents' => [ 'blog' ],
					'repeatParent' => true,
					'noNavQty' => 20
				]);
			});
			?>
		</div>
	</div><!-- /OFFCANVAS NAVIGATION -->

<?php if(page()->editable): ?>
	<!-- PAGE EDIT LINK -->
	<a id='edit-page' href='<?=page()->editUrl?>'>
		<?=ukIcon('pencil')?>
		<?=setting('edit')?>
	</a>
<?php endif;
// Google Fonts https://fonts.google.com/
googleFonts('Plaster|Roboto:300');
// Google Analytics Tracking Code ( /options/advanced-options/ga-code/ )
gaCode($gAnalytics);
?>
<pw-region id='bottom-region'></pw-region>
</body>
</html>
