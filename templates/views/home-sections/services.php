<?php namespace ProcessWire; ?>

<div class="uk-grid-large uk-grid-stack" data-uk-grid>

<!-- MAIN SERVICE -->
<div class="uk-width-xlarge@l uk-grid-item-match uk-flex-middle uk-first-column">

  <div class="uk-card uk-card-small uk-card-body">

    <span uk-icon="icon: cog; ratio: 3.5"></span>
    <p>
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    </p>

  </div>

</div><!-- /MAIN SERVICE -->

<!-- SERVICE CHILDREN -->
<div class="uk-width-expand@m uk-grid-item-match uk-flex-middle uk-grid-margin uk-first-column">

  <div class="service-items uk-child-width-1-1 uk-child-width-1-2@s uk-grid-match uk-grid uk-card">

  <?php
    $services = ['1 Service','2 Service', '3 Service', '4 Service' ];
    $icons = ['move', 'server', 'paint-bucket', 'plus-circle'];
    $service_body = [
      '1 Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      '2 Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      '3 Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      '4 Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
    ];
    foreach ($services as $key => $service) : ?>
      <!-- SERVICE ITEM -->
      <div class='service-item <?= sanitizer()->pageName($service); ?> uk-margin-small'>
        <a class="uk-link-reset not-hover uk-card uk-card-body uk-card-default uk-card-hover uk-text-left" href="#">
            <span uk-icon="icon: <?= $icons[$key] ?>; ratio: 2.2" class="uk-text-warning uk-icon"></span>
            <h3 class="uk-margin-small uk-h4"><?= $service ?></h3>
            <p class="uk-margin-left uk-text-lowercase">
              <?= $service_body[$key] ?>
            </p>
         </a>
      </div><!-- /SERVICE ITEM -->
  <?php endforeach; ?>

  </div>

</div><!-- /SERVICE CHILDREN -->

</div>
