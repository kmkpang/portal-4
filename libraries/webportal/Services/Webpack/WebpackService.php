<?php
/**
 * @package     Webportal\Services\Webpack
 * @subpackage
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

namespace Webportal\Services\Webpack;


use JUri;
use Webportal\PortalHelper;
use Webportal\Services\ServiceBase;

class WebpackService extends ServiceBase
{

    /**
     * Searches for js files related to this module and embeds them into header.
     * Also embeds core react libraries
     * If its debug, it ONLY embeds the single file ( because debug server is served from memory )
     *
     * @param string $typeScriptModuleName
     *
     *
     * @return \JDocument|null
     * @since 4.0.0
     */
    public function embedReactJsCss(string $typeScriptModuleName): ?\JDocument
    {
        $document = \JFactory::getDocument();
        $debug = \JFactory::getConfig()->get('debug');

        if ($debug) { // add react base library files
            $document->addScript(JUri::root() . 'node_modules/react/umd/react.development.js');
            $document->addScript(JUri::root() . 'node_modules/react-dom/umd/react-dom.development.js');
        } else {
            $document->addScript(JUri::root() . 'node_modules/react/umd/react.production.min.js');
            $document->addScript(JUri::root() . 'node_modules/react-dom/umd/react-dom.production.min.js');
        }

        $files = $debug ? ['js' => ["$typeScriptModuleName.js"], 'css' => []] : $this->getWebpackFiles($typeScriptModuleName);
        $uriBase = \JUri::root() . "media/com_webportal/dist/";
        if ($debug) {
            $uriBase = "http://localhost:3000/";
        }
        $document->addCustomTag('<link crossOrigin="*" rel="stylesheet/less" type="text/css" href="' . $uriBase . 'color.less" />
<script>
  window.less = {
    async: false,
    env: \'production\'
  };
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>');
        $document->addScriptDeclaration('
            window.uriBase="' . JUri::base() . '";
            window.uriRoot="' . JUri::root() . '";
        ');

        foreach ($files['js'] as $js) {
            $document->addScript($uriBase . $js);
        }
        foreach ($files['css'] as $css) {
            $document->addStyleSheet($uriBase . $css);
        }

        return PortalHelper::isUnitTesting() ? $document : null;
    }

    public function getWebpackFiles(string $typeScriptModuleName): array
    {
        // /Applications/MAMP/htdocs/p4_1/media/com_webportal/dist/72e9693e27ef79af1e62.js
        $webpackOutput = JPATH_ROOT . "/media/com_webportal/dist/";
        $jsFiles = glob("$webpackOutput*.js");
        $jsFiles = array_filter($jsFiles, function (string $fileName) use ($typeScriptModuleName) { // https://stackoverflow.com/a/15042216/533631

            return true;
//            /**
//             * $typeScriptModuleName = app
//             * <script src="runtime~app.js"></script> <--- OK
//             * <script src="ff9fe406ef74b5227dac.commons~app~multisiteConfiguration.js"></script>  <--- OK
//             * <script src="b58e97c3c57e298d15d7.app.js"></script>  <--- OK
//             * <script src="runtime~multisiteConfiguration.js"></script>  <--- NOOOO
//             * <script src="55235a1b32d96bc58755.vendors~multisiteConfiguration.js"></script>  <--- NOOOO
//             * <script src="22ae27da7e421dee8b1d.multisiteConfiguration.js"></script>  <--- NOOOO
//             *
//             */
//            if (strpos($fileName, "~$typeScriptModuleName") !== false || strpos($fileName, "$typeScriptModuleName.js") !== false) {
//                return true;
//            }
//            return false;
        });
        array_walk($jsFiles, function (string &$var) use ($webpackOutput) {
            $var = str_replace($webpackOutput, "", $var);
            //return strpos($var, ".js.map") > -1 ? false : true; // remove the *.js.map files
        });
        $cssFiles = \JFolder::files($webpackOutput, ".css", false, false);
        return ["js" => $jsFiles, "css" => $cssFiles];

    }
}
