<?php
/**
 * This file works as a cli starter point for doctrine scripts.
 * This is used only in generating sql command from php files
 * @copyright   Softverk Ltd
 * @license     Commercial
 */
require_once './cli/cliBootStrap.php'; // require joomla bootstrap
use Webportal\Wfactory;

try {
    $entityManager = Wfactory::getDb()->getEntityManager('PORTAL_ONLY_TABLES');
    return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
} catch (\Doctrine\ORM\ORMException $e) {
    echo "Failed to get entity manager with exception : " . $e->getMessage();
}

