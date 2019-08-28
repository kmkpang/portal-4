<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__ . '/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;
use Webportal\Services\Multisite\MultisiteService;


class MultisiteTest extends TestCase
{

    public function test_getAllSites()
    {
        /**
         * @var $multisite MultisiteService
         */
        $multisite = MultisiteService::getInstance();
        $sites = $multisite->getAllSites();
        $this->assertEquals(count($sites) > 0, true);
    }


    public function test_getSiteConfiguration(){
        /**
         * @var $multisite MultisiteService
         */
        $multisite = MultisiteService::getInstance();
        $site = $multisite->getSiteConfiguration(1);
        $this->assertNotNull($site);
    }

}
