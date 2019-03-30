<?php namespace ProcessWire;?>

<div class="uk-padding-small" data-uk-grid>

<?php
$info = ['Display Data', 'Users', 'Sales', 'Coffe Cups' ];
$icons = ['server', 'users', 'credit-card', 'happy'];
$numbers = ['27,126+', '987+', '1270+', '999+'];
$info_text = [
  '1 Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
  '2 Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
  '3 Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
  '4 Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
];
foreach ($info as $key => $item): ?>
  <div class='uk-card uk-card-body uk-card-default uk-card-hover uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l'>
    <a class='not-hover uk-link-reset uk-text-left' href="#">
          <?=ukIcon($icons[$key],['ratio' => 2.2, 'class'=> 'uk-text-warning']); ?>
          <h3 class="uk-margin-small uk-h4">
            <?= $item ?>
            <span class='uk-text-small uk-text-warning uk-text-large'> <?= $numbers[$key] ?></span>
          </h3>
          <p class="uk-margin-left uk-text-lowercase"><?= $info_text[$key] ?></p>
     </a>
  </div>
<?php endforeach; ?>

</div>
