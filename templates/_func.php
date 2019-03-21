<?php namespace ProcessWire;
/**
 *
 * @param array $opt https://www.addtoany.com/
 *
 */
function toAny($opt = ['t','f','g-p','l','r','e','g-m'])
{
    $out = '';
      $out .= "<!-- AddToAny BEGIN -->
      <div class='a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style' style='right:0px; top:150px; background-color: #2e2d2d99;'>
      <a class='a2a_dd' href='https://www.addtoany.com/share'></a>";
    if (in_array('f', $opt)) {
        $out .= "<a class='a2a_button_facebook'></a>";
    }
    if (in_array('t', $opt)) {
        $out .= "<a class='a2a_button_twitter'></a>";
    }
    if (in_array('g-p', $opt)) {
        $out .= "<a class='a2a_button_google_plus'></a>";
    }
    if (in_array('l', $opt)) {
        $out .= "<a class='a2a_button_linkedin'></a>";
    }
    if (in_array('r', $opt)) {
        $out .= "<a class='a2a_button_reddit'></a>";
    }
    if (in_array('e', $opt)) {
        $out .= "<a class='a2a_button_email'></a>";
    }
    if (in_array('g-m', $opt)) {
        $out .= "<a class='a2a_button_google_gmail'></a>";
    }
      $out .= "</div>
      <script async src='https://static.addtoany.com/menu/page.js'></script>
      <!-- AddToAny END -->";
      return $out;
}


/**
 *
 * @param PageArray $external_links
 * @param array $options
 *
 */
function externalLink(PageArray $external_links, $options = array()) {
$p_templ = page()->template;

$defaults = array(
  'style' => null, // Display blog post summary rather than full post? (null=auto-detect)
  'class' => null,
  'ratio' => '1.3',
);

$options = _ukMergeOptions($defaults, $options);

$out = '';
$style = $options['style'] ? "style='{$options['style']}'" : '';
$class = $options['class'] ? "class='{$options['class']}'" : '';
$ratio = $options['ratio'];

foreach ($external_links as $link) {
$icon = $link->text_1 ? "data-uk-icon='icon:$link->text_1; ratio: $ratio'" : '';
$title = $link->text_3 ? "title='$link->text_3'" : '';
$li_class = "ext-$p_templ external_link-" . sanitizer()->pageName($link->text_1, true);
$target = $link->checkbox ?  "target='_blank'" : '';
$no_follow = $link->checkbox_1 ?  "rel='nofollow'" : '';
$all_items = "$icon $title $target $no_follow";
    if($link->text_1 == 'rss' && $link->url_1 == '') $link->url_1 = pages()->get("template=blog-rss")->url;
    $out .= "\n<li class='$li_class uk-padding-remove'>";
    $out .= "\n\t<a $class $style href='$link->url_1' $all_items>$link->text_2 </a>\n</li>\n";
}
return $out;
}

/**
 *
 * Google Webmaster Tools Verification Code
 *
 * @param string|null $code
 *
 */
function gwCode($code = null)
{
    if ($code) {
        echo "<meta name='google-site-verification' content='$code' />\n";
    }
}

/**
 *
 * https://developers.google.com/analytics/devguides/collection/analyticsjs/
 *
 * @param string $code Google Analytics Tracking Code
 *
 */
function gaCode($code = null)
{
if($code) {
echo "\t<script defer src='https://www.googletagmanager.com/gtag/js?id=UA-{$code}'></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-{$code}');
    </script>\n";
    }
}

/**
 *
 * @param string $fonts
 *
 */
function googleFonts($fonts) {
  if($fonts) {
    echo "\t<script>
          /* ADD GOOGLE FONTS WITH WEBFONTLOADER ( BETTER PAGESPEED )
              https://github.com/typekit/webfontloader
          */
          WebFontConfig = {
                  google: {
                  families: ['$fonts']
              }
          };
              (function(d) {
                  var wf = d.createElement('script'), s = d.scripts[0];
                  wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
                  wf.async = true;
                  s.parentNode.insertBefore(wf, s);
              })(document);
    \t</script>\n";
  }
}

/**
 *
 * @param Page|null $item
 *
 */
function privacyPanel($item = null) {
if (!$item) return;
$out = '';
$out .= "<a class='uk-button uk-button-text uk-padding-small' style='color: tabasco;' href='{$item->url}'>";
$out .= ukIcon('info', ['ratio' => 2]) . ' ' . $item->title . ' ';
$out .= "<span class='uk-text-muted'>$item->headline</span></a>";
return $out;
}

/**
 *
 * @param Page $page
 *
 */
function seoPagination($page)
{
	$out = '';
// https://processwire.com/blog/posts/processwire-2.6.18-updates-pagination-and-seo/
    if (input()->pageNum > 1) {
        $out .= "<meta name='robots' content='noindex,follow'>\n";
    }
// https://weekly.pw/issue/222/
    if (config()->pagerHeadTags) {
        $out .= config()->pagerHeadTags . "\n";
    }
		return $out;
}

/********* MULTI LANGUAGE SUPPORT *********/

/**
 *
 * @param Page $page
 * @param Page $root
 *
 */
function langMenu($page, $root)
{
    // If Enable Multilanguage Modules
    if (!page()->getLanguages()) {
        return '';
    }
    $out = '';
    foreach (languages() as $language) {
    // is page viewable in this language?
        if (!$page->viewable($language)) {
            continue;
        }
        if ($language->id == user()->language->id) {
            $out .= "<li class='uk-active'>";
            $icon = ukIcon('world');
        } else {
            $out .= "<li>";
            $icon = '';
        }
        $url = $page->localUrl($language);
        $hreflang = $root->getLanguageValue($language, 'name');
        if($hreflang == 'home') $hreflang = 'x-default';
        $out .= "<a hreflang='$hreflang' href='$url'>$language->title $icon</a></li>";
    }
    return $out;
}
