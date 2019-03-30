<?php namespace ProcessWire; ?>

<div class="uk-child-width-1-2@m uk-child-width-1-3@l uk-grid-small uk-first-column" data-uk-grid>

<?php
$portfolios = ['Monkeys in Thailand', 'African Lion Safari', 'Ocean fishes'];
$body = [
  'Thailand is home to many different species of primates.',
  'African Lion Safari is a family-owned safari park in Southern Ontario, Canada.',
  'Some estimates report the world’s oceans are home to 20,000 species of fish.'
];
$img_size = ['250', '320', '350'];
foreach ($portfolios as $key => $portfolio): ?>

  <div class="uk-transition-toggle uk-inline-clip uk-first-column uk-scrollspy-inview uk-animation-fade">

    <div class="uk-transition-slide-bottom">
        <span class="uk-width-1-1 uk-inline" style="border: 10px solid #da7d02;"></span>
    </div>

    <div class="uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-card uk-card-body uk-card-small uk-light"
         data-src="https://picsum.photos/200/<?= $img_size[$key] ?>/?random.jpg" data-uk-img>

      <div class="uk-overlay-primary uk-position-cover"></div>

        <div class="uk-flex-column" data-uk-lightbox="animation: fade" data-uk-flex>
          <?php $item_images = ['250', '320', '350'];
          foreach ($item_images as $item): ?>
          <div>
            <a class="uk-link-reset hover uk-text-left uk-padding-small uk-button uk-button-text"
                href="https://picsum.photos/<?= $item ?>/300/?random.jpg" style="width: 60px">
              <span uk-icon="icon: image; ratio: 1.5" class="uk-text-warning"></span>
            </a>
          </div>
          <?php endforeach; ?>
        </div>

        <div>
          <a href="#" class="uk-link-reset hover uk-text-left uk-padding-small uk-button uk-button-text" >
            <h4><?= $portfolio ?></h4>
            <p class="uk-margin-left uk-text-lowercase uk-light"><?= $body[$key] ?></p>
                <span uk-icon="icon: forward; ratio: 1.5" class="uk-text-warning uk-icon"></span>
            </a>
        </div>

      </div>

    <div class="uk-transition-slide-top">
        <span class="uk-width-1-1 uk-inline" style="border: 10px solid #da7d02;"></span>
    </div>

  </div>

<?php endforeach; ?>

</div>
