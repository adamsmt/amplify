<?php
namespace Craft;

class AmplifyPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Amplify Plugin');
    }

    function getVersion()
    {
        return '.2';
    }

    function getDeveloper()
    {
        return 'Matt Adams';
    }

    function getDeveloperUrl()
    {
        return 'http://elementthree.com';
    }
    /**
     * Register twig extension
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.amplify.twigextensions.AmplifyTwigExtension');
        return new AmplifyTwigExtension();
    }
}
