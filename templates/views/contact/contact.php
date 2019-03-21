<?php namespace ProcessWire;
// Get Mail
$contact_mail = page()->e_mail;
$email_subject = page()->email_subject;
$privacy_page = pages()->get('template=basic-privacy');

// Optional
// $from_page = page()->httpUrl;

// Security field
$siteName = setting('site-name');
$security_field = strtolower($siteName);
// Get Last Image ( https://processwire.com/docs/fields/images/ )
$image = page()->images ? page()->images->last() : '';
?>

<!-- CONTENT BODY -->
<div id='content-body'>
<?php // Include contact form
wireIncludeFile("inc/contact/_c-form",
    [
    'contact_page' => page(), // Get Contact Page to save items pages('/contact/')
    'contact_item' => 'contact-item', // Template to create item ( It must have a body field )
    'mail_to' => $contact_mail ?: 'user@gmail.com', // Send To Mail
    'email_subject' => $email_subject, // Mail Subject
    'privacy_page' => $privacy_page->url, // Privacy Policy Page
    'security_field' => $security_field
    // 'from_page' => $from_page // Get Url Page
    ]
);?>
</div><!-- /CONTENT BODY -->

<!-- SIDEBAR -->
<div id='sidebar'>

  <?=ukHeading3(setting('contact-info'), ['line' => 'left', 'class' => 'uk-text-bold']);?>

  <div class="uk-card uk-card-default uk-padding-small uk-margin-bottom">
    <?php
      files()->include('inc/contact/_contact-info.php', ['item' => page()]);
    ?>
  </div>

  <div class='uk-background-fixed uk-background-cover uk-card uk-card-body uk-card-small'
       style="background-image: url(<?=$image->url;?>);" data-uk-img>
    <div class="uk-overlay-secondary uk-position-cover"></div>
    <div class='uk-card'><?=page()->sidebar;?></div>
  </div>

</div><!-- /SIDEBAR -->

<head id='html-head' pw-append>
<?php if (!$user->isLoggedin() && setting('turbolinks')) {
echo "<meta name='turbolinks-visit-control' content='reload'>\n";
}
?>
<style>
      .hide-robot {
          display: none;
      }
      #map {
          height: 380px;
          box-sizing: unset;
      }
  </style>
</head>

<?php if ($security_field): ?>
  <pw-region id="bottom-region">
  <script>
  /* https://www.w3schools.com/js/js_validation.asp */
    function validateForm() {
      var x = document.forms["cForm"]["security"].value;
      var security = x.toLowerCase();
      if (security != "<?=$security_field?>") {
        alert("<?=setting('label-security')?>");
        return false;
      }
    }
  </script>
  </pw-region>
<?php endif; ?>
