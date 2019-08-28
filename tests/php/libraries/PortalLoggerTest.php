<?php
/**
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__.'/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;
use Webportal\Wfactory;


class PortalLoggerTest extends TestCase
{

    public function test__initialize()
    {
        $result = Wfactory::getLogger();
        $this->assertNotEmpty($result);

    }

    public function test__logging()
    {
        Wfactory::getLogger()->debug("Unit test", __LINE__, __FILE__);
        Wfactory::getLogger()->warn("Unit test", __LINE__, __FILE__);
        Wfactory::getLogger()->error("Unit test", __LINE__, __FILE__);
        Wfactory::getLogger()->fatal("Unit test", __LINE__, __FILE__);
        $this->assertTrue(true);
    }

}
