<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__ . '/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;

class OfficeSentToWebTest extends TestCase
{

    public function test__create()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/officeCreate.xml');
        $office = new \Webportal\Services\Websending\OfficeSentToWeb($xmlString);
        $result = $office->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02311') !== false);

    }

    public function test__createNoLogo()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/officeCreate__noLogo.xml');
        $office = new \Webportal\Services\Websending\OfficeSentToWeb($xmlString);
        $result = $office->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02311') !== false);

    }


    public function test__createNoImage()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/officeCreate__noImage.xml');
        $office = new \Webportal\Services\Websending\OfficeSentToWeb($xmlString);
        $result = $office->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02311') !== false);

    }


    public function test__update()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/officeUpdate.xml');
        $xmlString = \Webportal\PortalHelper::embedOfficeId($xmlString);
        $office = new \Webportal\Services\Websending\OfficeSentToWeb($xmlString);
        $result = $office->update();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02311') !== false);

    }


    public function test__updateNoLogoNoImage()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/officeUpdate__noLogoNoImage.xml');
        $xmlString = \Webportal\PortalHelper::embedOfficeId($xmlString);
        $office = new \Webportal\Services\Websending\OfficeSentToWeb($xmlString);
        $result = $office->update();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02311') !== false);

    }
}
