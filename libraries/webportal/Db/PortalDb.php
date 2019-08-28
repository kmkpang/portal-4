<?php
/**
 * @package     Webportal\Db
 *
 * @copyright   Softverk Ltd.
 * @license     Commercial
 */

namespace Webportal\Db;

// bootstrap.php
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use PHPUnit\Runner\Exception;
use Underscore\Types\Strings;
use Webportal\Logger\PortalLogger;


class PortalDb
{
    /**
     * @var PortalDb
     * @since 4.0.0
     */
    private static $instance = null;

    private function __construct()
    {
        //Thou shalt not construct that which is unconstructable!
    }

    private function __clone()
    {
        //Me not like clones! Me smash clones!
    }

    /**
     *
     * @return PortalDb
     *
     * @since 4.0.0
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;

        }
        return static::$instance;
    }

    /**
     * @var   EntityManager
     * @since 4.0.0
     */
    private $entityManager;


    private $nonPortalTables = [
        "jos_action_log_config",
        "jos_action_logs",
        "jos_action_logs_extensions",
        "jos_action_logs_users",
        "jos_assets",
        "jos_associations",
        "jos_banner_clients",
        "jos_banner_tracks",
        "jos_banners",
        "jos_categories",
        "jos_contact_details",
        "jos_content",
        "jos_content_frontpage",
        "jos_content_rating",
        "jos_content_types",
        "jos_contentitem_tag_map",
        "jos_core_log_searches",
        "jos_extensions",
        "jos_fields",
        "jos_fields_categories",
        "jos_fields_groups",
        "jos_fields_values",
        "jos_finder_filters",
        "jos_finder_links",
        "jos_finder_links_terms0",
        "jos_finder_links_terms1",
        "jos_finder_links_terms2",
        "jos_finder_links_terms3",
        "jos_finder_links_terms4",
        "jos_finder_links_terms5",
        "jos_finder_links_terms6",
        "jos_finder_links_terms7",
        "jos_finder_links_terms8",
        "jos_finder_links_terms9",
        "jos_finder_links_termsa",
        "jos_finder_links_termsb",
        "jos_finder_links_termsc",
        "jos_finder_links_termsd",
        "jos_finder_links_termse",
        "jos_finder_links_termsf",
        "jos_finder_taxonomy",
        "jos_finder_taxonomy_map",
        "jos_finder_terms",
        "jos_finder_terms_common",
        "jos_finder_tokens",
        "jos_finder_tokens_aggregate",
        "jos_finder_types",
        "jos_languages",
        "jos_menu",
        "jos_menu_types",
        "jos_messages",
        "jos_messages_cfg",
        "jos_modules",
        "jos_modules_menu",
        "jos_newsfeeds",
        "jos_overrider",
        "jos_postinstall_messages",
        "jos_privacy_consents",
        "jos_privacy_requests",
        "jos_quix",
        "jos_quix_collection_map",
        "jos_quix_collections",
        "jos_quix_configs",
        "jos_quix_elements",
        "jos_quix_img_stats",
        "jos_redirect_links",
        "jos_schemas",
        "jos_session",
        "jos_tags",
        "jos_template_styles",
        "jos_ucm_base",
        "jos_ucm_content",
        "jos_ucm_history",
        "jos_update_sites",
        "jos_update_sites_extensions",
        "jos_updates",
        "jos_user_keys",
        "jos_user_notes",
        "jos_user_profiles",
        "jos_user_usergroup_map",
        "jos_usergroups",
        "jos_users",
        "jos_utf8_conversion",
        "jos_viewlevels",
    ];


    /**
     *
     * @param string $tables2parse Can be ALL_TABLES, PORTAL_ONLY_TABLES , NON_PORTAL_ONLY_TABLES
     * @param bool $force
     * @return EntityManager
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     * @since 4.0.0
     */
    public function getEntityManager(string $tables2parse = "ALL_TABLES", bool $force = false)
    {
        if (empty($this->entityManager) || $force) {
            $jConfig = \JFactory::getConfig();

            $conn = array(
                'dbname' => $jConfig->get('db'),
                'user' => $jConfig->get('user'),
                'password' => $jConfig->get('password'),
                'host' => $jConfig->get('host'),
                'driver' => 'pdo_mysql',
                'charset' => 'utf8',
                'driverOptions' => array(
                    1002 => 'SET NAMES utf8'
                )
            );
            $config = Setup::createConfiguration(true);

            $path = [];
            if ($tables2parse === 'ALL_TABLES') {
                $path = [__DIR__ . "/Entities/JosPortal/", __DIR__ . "/Entities/Other/"];
            } else if ($tables2parse === 'PORTAL_ONLY_TABLES') {
                $path = [__DIR__ . "/Entities/JosPortal/"];
            } else if ($tables2parse === 'NON_PORTAL_ONLY_TABLES') {
                $path = [__DIR__ . "/Entities/Other/"];
            }

            $driver = new AnnotationDriver(new AnnotationReader(), $path);
            AnnotationRegistry::registerLoader('class_exists');
            $config->setMetadataDriverImpl($driver);
            // We need to synch back to mysql db only the portal related tables which we can tightly control to work well
            // with doctrine

            $tables2Exclude = [
                // tables with no primary key generate exceptions
                'jos_contentitem_tag_map',
                'jos_core_log_searches',
                'jos_fields_values',
                'jos_finder_terms_common',
                'jos_finder_tokens',
                'jos_finder_tokens_aggregate',
                'jos_messages_cfg',
                'jos_user_profiles',
                'jos_utf8_conversion',
                'jos_utf8_conversion',
                "jos_quix",
                "jos_quix_collection_map",
                "jos_quix_collections",
                "jos_quix_configs",
                "jos_quix_elements",
            ];
            if ($tables2parse === 'NON_PORTAL_ONLY_TABLES') {

                // get all portal files first..that we need to exclude..
                $portalDbPhpFiles = \JFolder::files(__DIR__ . "/Entities/JosPortal/", "php");

                foreach ($portalDbPhpFiles as $phpFile) {
                    $phpFile = trim(str_replace(".php", "", $phpFile));
                    $php_file = Strings::toSnakeCase($phpFile);
                    if (Strings::startsWith($php_file, "_"))
                        $php_file = substr($php_file, 1);
                    $tables2Exclude[] = $php_file;
                }

            }
            if ($tables2parse === 'PORTAL_ONLY_TABLES') {
                $tables2Exclude = $this->nonPortalTables;
            }

            $excludeReg = '/^(?!(?:' . implode('|', $tables2Exclude) . ')$).*$/';

            $config->setFilterSchemaAssetsExpression($excludeReg);
            $this->entityManager = EntityManager::create($conn, $config);
            $this->entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
            $this->entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
            $this->entityManager->getConnection()->setAutoCommit(false);
        }

        return $this->entityManager;
    }

    /**
     * Truncates a table
     * @param string $className
     * @return bool
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\ConnectionException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public function truncateTable(string $className): bool
    {
        $cmd = $this->getEntityManager()->getClassMetadata($className);
        $connection = $this->getEntityManager()->getConnection();
        $connection->beginTransaction();

        try {
            $connection->query('SET FOREIGN_KEY_CHECKS=0');
            $connection->query('TRUNCATE TABLE ' . $cmd->getTableName());
            $connection->query('SET FOREIGN_KEY_CHECKS=1');
            $connection->commit();
            $this->getEntityManager()->flush();
        } catch (\Exception $e1) {
            try {
                PortalLogger::error('Can\'t truncate table ' . $cmd->getTableName() . '. Reason: ' . $e1->getMessage(), __LINE__, __FILE__);
                $connection->rollback();
                return false;
            } catch (Exception $e2) {
                PortalLogger::error('Can\'t rollback truncating table ' . $cmd->getTableName() . '. Reason: ' . $e2->getMessage(), __LINE__, __FILE__);
                return false;
            }
        }
        return true;
    }


}
