<?php
/**
 * @package     Webportal\Services\Configuration
 * @subpackage
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

namespace Webportal\Services\Multisite;

use phpDocumentor\Reflection\Types\Integer;
use Webportal\Services\ServiceBase;
use Webportal\Wfactory;

class MultisiteService extends ServiceBase
{

    /**
     * @return Array
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    function getAllSites(): Array
    {
        return Wfactory::getDb()
            ->getEntityManager()
            ->getRepository(\JosPortalSettings::class)
            ->findBy(["isDeleted" => false], ["id" => "DESC"]);
    }

    /**
     * Returns the site configuration by siteName
     *
     * @since 4.0.0
     * @param int $siteId
     * @return \JosPortalSettings
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    function getSiteConfiguration(int $siteId): \JosPortalSettings
    {

        return Wfactory::getDb()
            ->getEntityManager()
            ->getRepository(\JosPortalSettings::class)
            ->findOneBy(["id" => $siteId, "isDeleted" => false]);

    }


}
