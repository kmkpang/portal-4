<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__.'/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;
use Webportal\Services\Webpack\WebpackService;


class WebpackServiceTest extends TestCase
{

    public function test__embedReactJsCss()
    {
        $jsFile = 'multisitesUi';
        /**
         * @var $webpackService WebpackService
         */
        $webpackService = WebpackService::getInstance();
        /**
         * @var $document JDocument
         */
        $document = $webpackService->embedReactJsCss($jsFile);
        $found = false;
        foreach ($document->_scripts as $key => $val) {
            $found |= strpos($key, $jsFile) !== false;
        }

        $this->assertTrue(boolval($found));
    }

    public function test__getWebpackFiles()
    {
        /**
         * @var $webpackService WebpackService
         */
        $webpackService = WebpackService::getInstance();
        $files = $webpackService->getWebpackFiles("multisitesUi");
        $this->assertNotEmpty($files["js"]);
    }

}
