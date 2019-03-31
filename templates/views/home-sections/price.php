<?php namespace ProcessWire;

$buy_now = __('BUY NOW');
?>

<p class="uk-margin-auto">
  Our Product is the easiest way for teams to track their works progress. Our advance plans give you more tools to get the job done.
</p>

<div class="uk-grid uk-grid-small uk-child-width-1-3@m uk-margin-medium-top uk-grid-match" data-uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div > .uk-card; delay: 200" data-uk-grid>
<?php
$plans = [
  'personal' => [
    'title' => 'PERSONAL',
    'price' => ['9','99'],
    'introduction' => 'Per member billed annually',
    'functions' => [
      '2 users included',
      '1 GB of storage',
      'A beer jar',
    ]
  ],
  'professional' => [
    'title' => 'PROFESSIONAL',
    'price' => ['89','99'],
    'introduction' => 'Per member billed annually',
    'functions' => [
      '10 users included',
      '5 GB of storage',
      'Email support',
      'A beer jar with beer inside!',
    ]
  ],
  'corporate' => [
    'title' => 'CORPORATE',
    'price' => ['299', '99'],
    'introduction' => 'Per member billed annually',
    'functions' => [
      'Unlimited users',
      'Unlimited storage',
      'Email support',
      'Help center access',
    ]
  ]
];

foreach ($plans as $key => $plan): ?>
      <!-- price -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-flex uk-flex-column" data-uk-scrollspy-class="uk-animation-slide-left-small">
          <div class="uk-card-header uk-text-center">
            <h4 class="uk-text-bold"><?= $plan['title'] ?></h4>
          </div>
          <div class="uk-card-body uk-flex-1">
            <div class="uk-flex uk-flex-middle uk-flex-center">
              <span class='uk-text-warning' style="font-size: 4rem; font-weight: 200; line-height: 1em">
                <span class='uk-text-warning' style="font-size: 0.5em">$</span><?= $plan['price'][0] ?><small>.<?= $plan['price'][1] ?></small>
              </span>
            </div>
            <div class="uk-text-small uk-text-center uk-text-muted"><?= $plan['introduction'] ?></div>
            <ul>
              <?php foreach ($plan['functions'] as $function): ?>
                <li><?= $function ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="uk-card-footer">
            <a href="#" class="uk-button uk-button-primary uk-width-1-1"><?= $buy_now ?></a>
          </div>
        </div>
      </div>
      <!-- /price -->
<?php endforeach; ?>

</div>
