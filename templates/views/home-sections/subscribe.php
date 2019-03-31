<?php namespace ProcessWire;

// Subscribe Text
$subscribe_heading = __('Subscribe to the %s newsletter');

// Your E-Mail
$mail_to = 'youremail@gmail.com';

// CSRF Tokens
$token_name = $this->session->CSRF->getTokenName();
$token_value = $this->session->CSRF->getTokenValue();
// Privacy Page
$privacy_page = pages()->get('template=basic-privacy');
// Labels or Text
$email_subject = 'Subscribe List';
$label_success = 'You have been added to the list of subscribers';
$label_privacy = setting('label-privacy');
$subscribe_text = __('By subscribing, you agree with our');
$label_email = setting('label-email');
$submit = setting('submit');
$reset = setting('reset');

// If Submit Form
if (input()->post->submit) :

$m_from = $sanitizer->email(input()->post->email);

$csrf_match = setting('csrf-match');
$fill_fields = setting('fill-fields');
// IF CSRF TOKEN NOT FOUND
if (!session()->CSRF->hasValidToken()) {
    session()->Message = "
    <div class='uk-alert-danger' uk-alert>
      <a class='uk-alert-close' uk-close></a>
      <p>$csrf_match</p>
    </div>";
    // session()->redirect('./http404');
    session()->redirect('./');
}

// Fill fields correctly
if (!$m_from or !input()->post->accept_subscribe) {
      $session->Message = "
      <div class='uk-alert-danger' uk-alert>
        <a class='uk-alert-close' uk-close></a>
        <p>$fill_fields</p>
      </div>";
      session()->redirect('./');
}

// Prepare a message
$mess_body = "<h4>$label_email:</h4> $m_from";

$html = "<html><body>
            <p>$mess_body</p>
        </body></html>";

// Send Mail
$m = wireMail();
// separate method call usage
$m->to($mail_to); // specify CSV string or array for multiple addresses
$m->from($m_from);
$m->subject($email_subject);
$m->body($html);
$m->send();

// Session Message
session()->Message ="
<div class='uk-alert-success' uk-alert>
  <a class='uk-alert-close' uk-close></a>
  <p>$label_success</p>
</div>";

// Save Log
if(setting('save-subscribent-log')) {
  wire('log')->save('subscribent-list', "$m_from");
}

// Finally redirect ( refresh page ) user with Success Message
session()->redirect('./');

else :

// Session Message
if ($session->Message) {
    echo $session->Message;
// Show Basic Contact Form
}
?>

<h3 class='uk-h2'><?= sprintf( $subscribe_heading, setting('site-name') ) ?></h3>

<form name='subscribeForm' id='subscribe-form' class='subscribe-form uk-text-center' action='./' method='post'>
  <!-- CSRF -->
    <input type='hidden' id='_post_token' name='<?=$token_name?>' value='<?=$token_value?>'>
<!-- E-MAIL -->
    <input class='uk-input uk-form-width-large uk-form-large uk-width-2-3@s uk-text-center'
           style='font-size: 3rem; height: 80px; border: 2px solid #f1f1f1; border-radius: 90px;'
           name='email' placeholder='<?= $label_email ?>' type='email' required>
    <br>
    <br>
<!-- ACCEPT PRIVACY POLICY -->
    <label class='label-check'>
      <input class='accept-message uk-checkbox' name='accept_subscribe' type='checkbox' required>
      <small class="uk-text-uppercase uk-margin-top">
        <?= $subscribe_text ?>
        <a style="font-size: 1.3rem;" href="<?= $privacy_page->url ?>"><?= $label_privacy ?></a>.
      </small>
    </label>
    <br>
<!-- SUBMIT BUTTON -->
    <input id='submit' class='uk-button uk-button-primary uk-margin-small-top' name='submit' value='<?= $submit ?>' type='submit'>
<!-- RESET BUTTON -->
    <button class='uk-button uk-button-secondary uk-margin-small-top' type='reset'><?= $reset ?></button>
</form>

<?php endif;

// Remove Session Message
  session()->remove('Message');
