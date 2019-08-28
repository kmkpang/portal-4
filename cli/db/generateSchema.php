<?php
/**
 * @package    Wfactory
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

$path = __DIR__;
$path2 = getcwd();

require_once $path2 . '/cli/cliBootStrap.php';

/**
 * This script will generate database schema in libraries/webportal/db/entities
 * folder
 *
 * @since  4.0.0
 */
class GenerateSchema extends JApplicationCli
{
    /**
     * Entry point for CLI script
     *
     * @return  void
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     * @since   4.0.0
     */
    public function doExecute()
    {

        $passes = ['PORTAL_ONLY_TABLES', 'NON_PORTAL_ONLY_TABLES'];

        foreach ($passes as $pass) {
            $em = \Webportal\Wfactory::getDb()->getEntityManager($pass, true);
// fetch metadata
            $driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
                $em->getConnection()->getSchemaManager()
            );
            $em->getConfiguration()->setMetadataDriverImpl($driver);
            $cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
            $cmf->setEntityManager($em);
            $classes = $driver->getAllClassNames();
            $metadata = $cmf->getAllMetadata();
            $generator = new Doctrine\ORM\Tools\EntityGenerator();
            $generator->setUpdateEntityIfExists(true);
            $generator->setGenerateStubMethods(true);
            $generator->setGenerateAnnotations(true);

            $outputPath = $pass === 'PORTAL_ONLY_TABLES' ?
                JPATH_ROOT . "/libraries/webportal/Db/Entities/JosPortal" :
                JPATH_ROOT . "/libraries/webportal/Db/Entities/Other";

            $generator->generate($metadata, $outputPath);
        }


    }
}


JApplicationCli::getInstance('GenerateSchema')->execute();
