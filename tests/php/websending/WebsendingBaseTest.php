<?php
/**
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
declare(strict_types=1);

require_once __DIR__ . '/../phpunitbootstrap.php';

use PHPUnit\Framework\TestCase;
use Webportal\Services\Websending\WebsendingBase;

class WebsendingBaseTest extends TestCase
{

    /**
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public function test__uploadToCloudinarySuccess()
    {
        $siteName = 'softverk';
        $sagaUrl = 'http://fsv.is/assets/img/logo.png';
        $imageConfig = [
            'OFFICE' => 1,
            'IMAGE' => 'test.png'
        ];

        $result = (new WebsendingBase())->uploadToCloudinary($siteName, $imageConfig, $sagaUrl);
        $this->assertIsString($result);

    }

    /**
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public function test__uploadToCloudinaryFailure()
    {
        $siteName = 'softverk';
        $sagaUrl = 'http://x.is/assets/img/x.png';
        $imageConfig = [
            'OFFICE' => 1,
            'IMAGE' => 'test.png'
        ];

        $result = (new WebsendingBase())->uploadToCloudinary($siteName, $imageConfig, $sagaUrl);
        $this->assertNull($result);

    }


}
