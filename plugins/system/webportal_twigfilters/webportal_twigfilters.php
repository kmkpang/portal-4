<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Webportal_Bootstap
 *
 * @copyright Softverk Ltd.
 * @license Commercial
 */

defined('_JEXEC') or die;


class plgSystemWebportal_Twigfilters extends JPlugin
{

    public function onGantry5AdminInit($theme)
    {
        $twig = $theme->renderer();
        $twig->addFilter(new \Twig_SimpleFilter('tel', [$this, 'markAnchorAsPhone']));
    }

    public function onGantry5ThemeInit($theme)
    {
        $twig = $theme->renderer();
        $twig->addFilter(new \Twig_SimpleFilter('tel', [$this, 'markAnchorAsPhone']));
    }

    public function markAnchorAsPhone($text)
    {
        return "tel:$text";
    }


}
