<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__ . '/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;

class AgentSentToWebTest extends TestCase
{

    public function test__create()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/agentCreate.xml');
        $xmlString = \Webportal\PortalHelper::embedOfficeId($xmlString);
        $agent = new \Webportal\Services\Websending\AgentSentToWeb($xmlString);
        $result = $agent->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02211') !== false);

    }

    public function test__createNoImage()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/agentCreate__noImage.xml');
        $xmlString = \Webportal\PortalHelper::embedOfficeId($xmlString);
        $agent = new \Webportal\Services\Websending\AgentSentToWeb($xmlString);
        $result = $agent->create();
        $this->assertIsString($result);
        $this->assertTrue(strpos($result, '02211') !== false);

    }

    //--------------------

    public function test__update()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/agentUpdate.xml');
        $xmlString = \Webportal\PortalHelper::embedAgentId($xmlString);
        $agent = new \Webportal\Services\Websending\AgentSentToWeb($xmlString);
        $result = $agent->update();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02221') !== false);

    }


    public function test__updateNoLogoNoImage()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/agentUpdate__noImage.xml');
        $xmlString = \Webportal\PortalHelper::embedAgentId($xmlString);
        $agent = new \Webportal\Services\Websending\AgentSentToWeb($xmlString);
        $result = $agent->update();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02221') !== false);

    }

    // ----------

    //--------------------

    public function test__delete()
    {
        $xmlString = file_get_contents(__DIR__ . '/xml/agentDelete.xml');
        $xmlString = \Webportal\PortalHelper::embedAgentId($xmlString);
        $agent = new \Webportal\Services\Websending\AgentSentToWeb($xmlString);
        $result = $agent->delete();
        $this->assertIsString($result);

        // check if things were updated..

        $this->assertTrue(strpos($result, '02231') !== false);

    }
}
