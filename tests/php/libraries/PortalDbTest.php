<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__.'/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;
use Webportal\Wfactory;


class PortalDbTest extends TestCase
{

    public function test__initialize()
    {
        $result = Wfactory::getDb();
        $this->assertNotEmpty($result);
    }

    public function test__select()
    {
        /**
         * @var $portalConfiguration JosPortalSettings
         */
        $portalConfiguration = Wfactory::getDb()->getEntityManager()->find('JosPortalSettings', 1);
        $this->assertEquals($portalConfiguration->getId(), 1);

    }

}
