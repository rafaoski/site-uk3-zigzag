<?php namespace ProcessWire; ?>

<div class='uk-child-width-1-2@m uk-child-width-1-3@l ' data-uk-grid>

<?php
$team = ['Alex White', 'Jennifer Lawrence', 'Bob Dylan'];
$img_size = ['250', '320', '350'];
$phone = ['+1 (409) 987–5874', '+1 (409) 987–5874', '+1 (409) 987–5874'];
$e_mail = ['+1 (409) 987–5874', '+1 (409) 987–5874', '+1 (409) 987–5874'];
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
];

foreach ($team as $key => $item):
?>

<div class='uk-transition-toggle uk-inline-clip hover'>
    <a href="#">
      <div class='uk-background-cover uk-card uk-card-body uk-card-small uk-height-medium uk-transition-toggle'
            data-src="https://picsum.photos/200/<?= $img_size[$key] ?>/?random.jpg" data-uk-img>

            <div class="uk-overlay-primary uk-position-cover"></div>

            <div class="uk-overlay uk-position-center">
              <?= $item ?>
            </div>

            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                   <div class="uk-position-center uk-overlay uk-flex uk-flex-center uk-flex-middle uk-flex-column">
                     <h3 class='uk-text-warning'><?= $small_text[$key] ?></h3>
                     <p class='uk-light'><?= $medium_text[$key] ?></p>
                   </div>
            </div>
      </div>
    </a>

    <ul class="uk-iconnav uk-flex uk-flex-center uk-margin-small">
      <li>
        <a style="border: 2px solid; padding: 9px; border-radius: 90px; margin: 2px;" href="https://facebook.com/"
           data-uk-icon="icon:facebook; ratio: 1.3" target="_blank">
        </a>
      </li>
      <li>
        <a style="border: 2px solid; padding: 9px; border-radius: 90px; margin: 2px;" href="https://twitter.com/"
           data-uk-icon="icon:twitter; ratio: 1.3" target="_blank">
        </a>
      </li>
      <li>
        <a style="border: 2px solid; padding: 9px; border-radius: 90px; margin: 2px;" href="https://www.instagram.com/"
           data-uk-icon="icon:instagram; ratio: 1.3" target="_blank">
        </a>
      </li>
     <?php
      // Phone
      if ($phone[$key]): ?>
        <li class='uk-margin-small uk-width-1-1'>
            <?=ukIcon('phone');?>
            <?= $phone[$key] ?>
        </li>
      <?php endif;
      // E-Mail
      if ($e_mail[$key]): ?>
        <li class='uk-width-1-1'>
            <a href="mailto:<?= $e_mail[$key] ?>">
                <?=ukIcon('mail');?>
                <?= $e_mail[$key] ?>
            </a>
        </li>
      <?php endif; ?>
    </ul>
    <div class="uk-transition-slide-top">
        <span class='uk-width-1-1 uk-inline' style='border: 2px solid #da7d02;'></span>
    </div>
</div>

<?php endforeach; ?>

</div>
