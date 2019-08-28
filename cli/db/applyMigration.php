<?php
/**
 * @package    Wfactory
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

require_once __DIR__.'/../cliBootStrap.php';

use Webportal\Logger\PortalLogger;
use Webportal\Wfactory;

/**
 * This script will take in all sql files from [PROJECT_ROOT]/migration folder and apply them
 * Or conditionally specify which migration file to apply
 * // /Applications/MAMP/bin/php/php7.2.8/bin/php /Applications/MAMP/htdocs/p4_1/cli/db/applyMigration.php --files=test.sql,test2.sql
 * @since  4.0.0
 */
class ApplyMigration extends JApplicationCli
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
        $migrationPath = JPATH_ROOT . DS . 'migration' . DS;
        $args = $GLOBALS['arguments'];
        $files = $args['files'] ?? null;
        if (!empty($files)) {
            $files = explode(',', $files);
        }

        if (empty($files) || count($files) === 0) {
            $files = \JFolder::files($migrationPath, 'sql');
        }

        $em = Wfactory::getDb()->getEntityManager();
        foreach ($files as $f) {

            $sqlFile = $migrationPath . $f;
            if (JFile::exists($sqlFile)) {
                $sql = file_get_contents($sqlFile);
                try {
                    $stmt = $em->getConnection()->prepare($sql);
                    $stmt->execute();
                } catch (Exception $e) {
                    PortalLogger::getInstance()->error("Failed to execute $sql : " . $e->getMessage(), __LINE__, __FILE__);
                }
            } else {
                PortalLogger::getInstance()->warn("File $sqlFile does not exist", __LINE__, __FILE__);
            }

        }


        //foreach ()


    }
}


JApplicationCli::getInstance('ApplyMigration')->execute();
