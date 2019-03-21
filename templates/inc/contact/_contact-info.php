<?php namespace ProcessWire;?>

<ul class="uk-nav uk-nav-default uk-nav-parent-icon">
<?php // PHONE
if ($item->phone): ?>
	<li>
		<span data-uk-icon="icon: phone" class="uk-margin-small-right"></span>
		<span class="uk-text-small"><?=$item->phone?></span>
	</li>
<?php endif;
// E-MAIL
if ($item->e_mail): ?>
	<li><a href="mailto:<?=$item->e_mail?>" target="_blank">
		<span data-uk-icon="icon: mail" class="uk-margin-small-right"></span>
		<span class="uk-text-small uk-text-muted"><?=$item->e_mail?></span></a>
	</li>
<?php endif;
// ADRESS
if ($item->adress): ?>
	<li>
		<span data-uk-icon="icon: location" class="uk-margin-small-right"></span>
		<span class="uk-text-small"><?=$item->adress?></span>
	</li>
<?php endif; ?>
</ul>
