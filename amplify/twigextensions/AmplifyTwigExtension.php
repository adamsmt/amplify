<?php
namespace Craft;
use Twig_Extension;
use Twig_Filter_Method;
class AmplifyTwigExtension extends Twig_Extension
{
    public function getName()
    {
        return 'amplify';
    }
    public function getFilters()
    {
        return array(
            'amplify' => new Twig_Filter_Method($this, 'amplifyFilter'),
        );
    }
    /**
     * The "amplify" filter shakes up the order of words in a sentence.
     *
     * Usage: {{ "Bartender, I'd like a drink please."|amplify }}
     */
    public function amplifyFilter($html)
    {
      $html = str_ireplace(
          ['<img','<video','/video>','<audio','/audio>'],
          ['<amp-img','<amp-video','/amp-video>','<amp-audio','/amp-audio>'],
          $html
      );
      # Add closing tags to amp-img custom element
      $html = preg_replace('/<amp-img(.*?)>/', '<amp-img$1></amp-img>',$html);
      # Whitelist of HTML tags allowed by AMP
      $html = strip_tags($html,'<h1><h2><h3><h4><h5><h6><a><p><ul><ol><li><blockquote><q><cite><ins><del><strong><em><code><pre><svg><table><thead><tbody><tfoot><th><tr><td><dl><dt><dd><article><section><header><footer><aside><figure><time><abbr><div><span><hr><small><br><amp-img><amp-audio><amp-video><amp-ad><amp-anim><amp-carousel><amp-fit-rext><amp-image-lightbox><amp-instagram><amp-lightbox><amp-twitter><amp-youtube>');
      #strips out stuff in brackets
      $html = preg_replace('#\s*\[.+\]\s*#U', ' ', $html);
      #adds layout responsive to images that are inline
      $html = preg_replace('/(<amp-img\b[^><]*)>/i', '$1 layout="responsive">', $html);
      #removes empty paragraphs
      $pattern = "/<p[^>]*><\\/p[^>]*>/";
      $html = preg_replace($pattern, '', $html);
      return $html;
    }
}
