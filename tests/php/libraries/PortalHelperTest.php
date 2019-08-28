<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__.'/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;


class PortalHelperTest extends TestCase
{

    public function test__IsUnitTesting()
    {
        $this->assertTrue(\Webportal\PortalHelper::isUnitTesting());
    }

    public function test__IsCliMode()
    {
        $this->assertTrue(\Webportal\PortalHelper::isCliMode());
    }

    public function test__yaml2php()
    {
        $result = "/tmp/result.php";
        \Webportal\PortalHelper::yaml2php(
            JPATH_ROOT . "/libraries/webportal/Quix/app/properties-search/config.yml.example.bkup",
            $result
        );
        $this->assertFileExists($result);
    }
}
