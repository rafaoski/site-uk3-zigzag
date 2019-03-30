<?php namespace ProcessWire;?>

<div class='uk-child-width-1-3@m uk-flex uk-flex-around' style='margin: 0;' data-uk-grid>

<?php
$testimonials = ['David Nicholson', 'Summer Geller', 'Brian Murdoch', 'John Wick'];
$img_size = ['250', '320', '350', '400'];
$small_text = [
  "Lorem Ipsum has been the industry's",
  "Lorem Ipsum has been the industry's",
  "Lorem Ipsum has been the industry's",
  "Lorem Ipsum has been the industry's"
];
$medium_text = [
  "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
  "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
  "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
  "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
];
foreach ($testimonials as $key => $item ): ?>
<div class='uk-background-cover testimonial-item uk-transition-toggle uk-inline-clip hover uk-border-circle uk-height-medium'
     style='width: 300px; height: 300px; margin: 10px'
     data-src="https://picsum.photos/200/<?= $img_size[$key] ?>/?random.jpg" data-uk-img>
<div class="uk-overlay-primary uk-position-cover"></div>

      <a href="#">
        <div class="uk-overlay uk-position-center uk-text-center">
          <?=ukHeading3($item, ['class' => 'uk-h2 uk-text-warning']); ?>
          <p class='uk-light uk-text-muted'><?= $small_text[$key] ?></p>
        </div>

        <div class="uk-transition-fade uk-position-center uk-overlay uk-overlay-primary uk-flex uk-flex-middle uk-text-center">
              <p class='uk-light'><?= $medium_text[$key] ?></p>
        </div>
      </a>

  <div class="uk-transition-slide-bottom">
    <span class='uk-width-1-1 uk-inline' style='border: 20px solid tomato;'></span>
  </div>

</div>
<?php endforeach;?>

</div>
