<?php namespace ProcessWire; ?>

<nav pw-append='content-body'>
	<?=ukDescriptionListPages(page()->children)?>
</nav>

<!-- <aside id='sidebar' pw-prepend>
	<?php // echo ukNav(page()->rootParent, "depth=3")?>
</aside> -->
