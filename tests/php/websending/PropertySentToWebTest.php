<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__ . '/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;

class PropertySentToWebTest extends TestCase
{

    public function test__create()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/propertyCreate.xml');
        $xmlString = \Webportal\PortalHelper::embedAgentId($xmlString);
        $property = new \Webportal\Services\Websending\PropertySentToWeb($xmlString);
        $result = $property->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02121') !== false);

    }

    public function test__createNoImage()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/propertyCreate__noImage.xml');
        $xmlString = \Webportal\PortalHelper::embedAgentId($xmlString);
        $property = new \Webportal\Services\Websending\PropertySentToWeb($xmlString);
        $result = $property->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02121') !== false);

    }

    //--------------------

    public function test__update()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/propertyUpdate.xml');
        $xmlString = \Webportal\PortalHelper::embedPropertyId($xmlString);
        $property = new \Webportal\Services\Websending\PropertySentToWeb($xmlString);
        $result = $property->update();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02121') !== false);

    }


    // ----------

    //--------------------

    public function test__delete()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/propertyDelete.xml');
        $xmlString = \Webportal\PortalHelper::embedPropertyId($xmlString);
        $property = new \Webportal\Services\Websending\PropertySentToWeb($xmlString);
        $result = $property->delete();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02231') !== false);

    }
}
