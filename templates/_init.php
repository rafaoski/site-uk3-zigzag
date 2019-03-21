<?php namespace ProcessWire;
/**
 * This _init.php file is called automatically by ProcessWire before every page render
 *
 */
/** @var ProcessWire $wire */

// Set Jquery For Blog Post
urls()->set('jquery', 'wire/modules/Jquery/JqueryCore/JqueryCore.js');

setting([
// https://processwire.com/api/ref/functions/wire-date/
        // 'wire-date' => wireDate('ts', page()->date_time_field),
// https://processwire.com/api/ref/wire-date-time/date/
        // 'wire-datetime' => datetime()->date('ts'),
// GET Home Page
    'home' => pages()->get('/'),
// Custom CSS Classes
    'body-classes' => WireArray([
        'template-' . page()->template->name,
        'page-' . page()->id,
    ]),
// Options Page
    'site-name' => pages()->get('options')->headline,
    'site-description' => pages()->get('options')->summary,
    'logo' => pages()->get('options')->logo,
    'favicon' => pages()->get('options')->favicon,
    'save-messages-page' => pages('options')->select_options->get("name=save-messages-page"),
    'save-messages-log' => pages('options')->select_options->get("name=save-messages-log"),
    'gw-code' => pages('options')->select_options->get("name=gw-code"),
    'ga-code' => pages('options')->select_options->get("name=ga-code"),
    'disable-comments' => pages('options')->select_options->get("name=disable-comments"),
    'turbolinks' => pages('options')->select_options->get("name=turbolinks"),
    'social-profiles' => pages('options')->select_options->get("name=social-profiles"),
    'share-buttons' => pages('options')->select_options->get("name=share-buttons"),
    'floating-information' => pages('options')->select_options->get("name=floating-information"),
    'header-image' => pages('options')->select_options->get("name=enable-header-image"),
// Custom Pages
    'contact-page' => pages()->get("template=contact"),
// Get Styles
    'css-files' => WireArray([
        urls('templates') . "assets/css/uikit-zigzag.css"
    ]),
// Get Scripts
    'js-files' => WireArray([
        urls('templates') . "assets/js/app.js"
    ]),
    'turbolinks-js' => "\n<script src='" . urls('templates') . "assets/js/turbolinks.js" . "' defer></script>",

/* CHECK IF LANGUAGE IS ENABLED */
    'languages' => page()->getLanguages() && $modules->isInstalled("LanguageSupportPageNames"),

/* TRANSLATABLE STRINGS */

// Basic Transate
    'lang-code' => __('en'),
    'search-placeholder' => __('Search'),
    'edit' => __('Edit'),
    'next' => __('Next'),
    'previous' => __('Previous'),
    'read-more' => __('Read More'),
    'mobile-nav' =>  __('Mobile Nav Menu'),
    'debug-regions' => __('Debug Regions'),
// Search PAGE
    'found-pages' => __("Found %d page(s)."),
    'no-found' =>  __('Sorry, no results were found.'),
// Blog Translate ( views/blog/all-files* )
    'in-blog' => __('In The Blog'),
    'more-blog' => __('More blog posts'),
    'recent-posts' => __('Recent Posts'),
    'more-posts' => __('More posts'),
    'byline-text' => __('Posted by %1$s on %2$s'),
// Comments Form
    'post-comment' => __('Post a comment'),
    'comment-text' => __('Comments'),
    'success-message' => __('Thank you, your comment has been posted.'),
    'pending-message' => __('Your comment has been submitted and will appear once approved by the moderator.'),
    'error-message' => __('Your comment was not saved due to one or more errors.') . ' ' .
    __('Please check that you have completed all fields before submitting again.'),
    'comment-cite' => __('Your Name'),
    'comment-email' => __('Your E-Mail'),
    'comment-website' => __('Website'),
    'comment-stars' => __('Your Rating'),
    'comment-submit' => __('Submit'),
    'stars-required' => __('Please select a star rating'),
// Contact Info Translate
    'contact-info' => __('Contact Info'),
    'more-contact' => __('More Contact Information'),
// Contact Form Translate
    'not-fill' => __('Do Not Fill First Security Input !!!'),
    'contact-form' => __('Contact Form'),
    'label-name' => __('Name'),
    'label-email' => __('E-Mail'),
    'label-security' => __('Security Field ... Enter the name of our site ...'),
    'label-message' => __('Message'),
    'submit' => __('Submit'),
    'reset' => __('Reset'),
    'show-form' => __('Show Form'),
    'label-success' => __('Success !!! Your message has been sent'),
    'label-accept' => __('By submitting a query, you accept'),
    'label-privacy' => __('Privacy Policy'),
    'something_wrong' => __('Something Wrong !!! Try it again'),
    'fill-fields' => __('Fill the fields correctly !!!'),
    'csrf-match' =>  __('Stop ... Session CSRF Not Match !!!'),
]);

include_once('./_custom-uikit.php');
include_once('./_func.php');

// ADD USER => https://processwire.com/api/variables/user/
    // $u = $users->add('user-demo');
    // $u->pass = "demo99";
    // $u->addRole("guest");
    // $u->save();

// RESET PASSWORD => https://processwire.com/talk/topic/1736-forgot-backend-password-how-do-you-reset/
    // $u = $users->get('admin'); // or whatever your username is
    // $u->of(false);
    // $u->pass = 'your-new-password';
    // $u->save();
