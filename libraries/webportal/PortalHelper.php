<?php
/**
 * @package     Wfactory
 * @subpackage
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

namespace Webportal;

use Joomla\CMS\Language\LanguageHelper;
use Webportal\Db\PortalDb;

class PortalHelper
{

    /**
     * Is running cli or web?
     * @return bool
     *
     * @since 4.0.0
     */
    public static function isCliMode(): bool
    {
        return php_sapi_name() === 'cli';
    }

    public static function isUnix(): bool
    {
        return DIRECTORY_SEPARATOR === '/';
    }

    public static function isUnitTesting(): bool
    {
        return defined('__ISUNITTEST') && __ISUNITTEST;
    }

    public static function jsonEncode($object): string
    {
        return json_encode($object, JSON_UNESCAPED_UNICODE);
    }

    /**
     * This fixes the crappy html generated by ms word into something more pleasant!
     * @param $s
     * @return string
     */
    public static function escapePercentU(string $s)
    {
        $s = preg_replace("/%u([A-Fa-f0-9]{4})/", "&#x$1;", $s);
        $s = preg_replace("/font-size:.*pt;/i", "font-size: 10pt;", $s);
        $s = preg_replace('/<font[^>]*>/', '<font size="2">', $s);

        return html_entity_decode($s, ENT_COMPAT, 'utf-8');
    }

    /**
     * Reads an yaml file and outputs the result as a php array to a file
     * @param string $inputPath
     * @param string $outputPath
     */
    public static function yaml2php(string $inputPath, string $outputPath): void
    {
        $array = \Spyc::YAMLLoadString(file_get_contents($inputPath));
        $result = var_export($array, 1);
        file_put_contents($outputPath, "<?php \$array = $result; ?>");
    }

    private static $__knownLang = null;

    /**
     * Returns a list of available languages in joomla
     * NOTE: returns short tags
     * @return array
     */
    public static function getKnownLanguages(): array
    {
        if (!self::$__knownLang) {
            $languages = LanguageHelper::getKnownLanguages();
            $result = [];
            foreach ($languages as $key => $val) {
                array_push($result, substr($key, 0, 2));
            }
            self::$__knownLang = $result;
        }
        return self::$__knownLang;
    }


    public static function getFormattedXml(string $xmlString): string
    {
        $doc = new \DOMDocument();
        $doc->loadXML($xmlString);
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        return $doc->saveXML();
    }

    /**
     * @return \JosPortalSettings|object
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public static function getSiteSettings()
    {
        if (self::isUnitTesting()) {

            return Wfactory::getDb()->getEntityManager()->find(\JosPortalSettings::class, 1);

        } else {
            //TODO
        }
    }

    private static $halftag = "";
    private static $fulltag = "";

    /**
     * @param bool $halftag | will return only leading part of the languge..like if language is en-GB, will return en
     * @return string
     */
    public static function getCurrentlySelectedLanguage($halftag = true)
    {
        if ($halftag && !empty(static::$halftag)) {
            return static::$halftag;
        } else if (!$halftag && !empty(static::$fulltag)) {
            return static::$fulltag;
        }


        $language = \JFactory::getLanguage()->getTag();
        if ($halftag) {

            static::$halftag = explode('-', $language)[0];
            return static::$halftag;
        }

        static::$fulltag = $language;
        return static::$fulltag;
    }

    private static $currentPage;

    public static function setCurrentPage($pageName)
    {
        self::$currentPage = true;
        self::setSessionVariable('webportal.current_page', $pageName);

        \JFactory::getDocument()->addScriptDeclaration('var currentPage = \'' . $pageName . '\'');
    }

    public static function getCurrentPage()
    {
        if (self::$currentPage)//return ONLY if it has actually been set in current execution circle
            return self::getSessionVariable('webportal.currentPage');
        return null;
    }

    public static function setSessionVariable($key, $value)
    {
        $session = \JFactory::getSession();
        $session->set($key, $value);
    }

    public static function getSessionVariable($key)
    {
        $session = \JFactory::getSession();
        return $session->get($key, null);
    }

    /**
     * Same as get_object_vars , but deep , recursive
     * @param $obj
     * @return array
     */
    public static function get_object_vars($obj)
    {
        if (is_object($obj)) $obj = (array)$obj;
        if (is_array($obj)) {
            $new = array();
            foreach ($obj as $key => $val) {
                $new[$key] = self::get_object_vars($val);
            }
        } else $new = $obj;
        return $new;
    }


    /**
     * This function is used in unit test.
     * Create an office and returns the uniqueId
     * @return string
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    private static function createOffice(): string
    {
        $xmlString = file_get_contents(JPATH_ROOT . '/tests/php/websending/xml/officeCreate__beforeUpdateDelete.xml');
        $office = new Services\Websending\OfficeSentToWeb($xmlString);
        $result = $office->create();
        $xml = simplexml_load_string($result);
        return (string)$xml->Response->Message->UniqueID;
    }

    /**
     * This function is used in unit test.
     * Create an agent and returns the uniqueId
     * @param $officeUniqueId
     * @return string
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    private static function createAgent(&$officeUniqueId): string
    {
        $xmlString = file_get_contents(JPATH_ROOT . '/tests/php/websending/xml/agentCreate__beforeUpdateDelete.xml');
        $xmlString = self::embedOfficeId($xmlString, $officeUniqueId);
        $agent = new Services\Websending\AgentSentToWeb($xmlString);
        $result = $agent->create();
        $xml = simplexml_load_string($result);
        return (string)$xml->Response->Message->UniqueID;
    }

    /**
     * This function is used in unit test.
     * Create an agent and returns the uniqueId
     * @param $officeUniqueId
     * @param $agentUniqueId
     * @return string
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    private static function createProperty(&$officeUniqueId, &$agentUniqueId): string
    {
        $xmlString = file_get_contents(JPATH_ROOT . '/tests/php/websending/xml/propertyCreate__beforeUpdateDelete.xml');
        $xmlString = self::embedAgentId($xmlString, $officeUniqueId, $agentUniqueId);
        $property = new Services\Websending\PropertySentToWeb($xmlString);
        $result = $property->create();
        $xml = simplexml_load_string($result);
        return (string)$xml->Response->Message->UniqueID;
    }

    /**
     * This function is used in unit test. it changes the xml string by attaching office it to it
     * @param $xmlString
     * @param $uniqueId
     * @return mixed
     */
    private static function changeOfficeUniqueIdInXml($xmlString, $uniqueId)
    {
        $xml = simplexml_load_string($xmlString);
        if ($xml->Offices) // officeXml
            $xml->Offices->Office->Information->OfficeID = $uniqueId;
        if ($xml->SalesAssociates) // agentXml
            $xml->SalesAssociates->SalesAssociate->Information->OfficeID = $uniqueId;
        if ($xml->Properties) // propertyXml
            $xml->Properties->Property->Information->OfficeID = $uniqueId;
        $data = $xml->asXML();
        return $data;
    }

    /**
     * This function is used in unit test. it changes the xml string by attaching agent id to it
     * @param $xmlString
     * @param $uniqueId
     * @return mixed
     */
    private static function changeAgentUniqueIdInXml($xmlString, $uniqueId)
    {
        $xml = simplexml_load_string($xmlString);
        if ($xml->SalesAssociates) // agentXml
            $xml->SalesAssociates->SalesAssociate->Information->SaleID = $uniqueId;
        if ($xml->Properties) // propertyXml
            $xml->Properties->Property->Information->SaleID = $uniqueId;
        $data = $xml->asXML();
        return $data;
    }

    /**
     * This function is used in unit test. it changes the xml string by attaching property id to it
     * @param $xmlString
     * @param $uniqueId
     * @return mixed
     */
    private static function changePropertyUniqueIdInXml($xmlString, $uniqueId)
    {
        $xml = simplexml_load_string($xmlString);
        $xml->Properties->Property->Information->PropertyID = $uniqueId;
        $data = $xml->asXML();
        return $data;
    }


    /**
     * This function is used in unit test. It will create a office and embed the office id in the xml string
     * @param $xmlString
     * @param null $officeUniqueId
     * @return string
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public static function embedOfficeId($xmlString, &$officeUniqueId = null): string
    {
        $officeUniqueId = self::createOffice();
        return self::changeOfficeUniqueIdInXml($xmlString, $officeUniqueId);
    }

    /**
     * This function is used in unit test. It will create a agent and embed the agent id in the xml string
     * @param $xmlString
     * @param null $agentUniqueId
     * @param null $officeUniqueId
     * @return string
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public static function embedAgentId($xmlString, &$officeUniqueId = null, &$agentUniqueId = null): string
    {
        if (!$officeUniqueId)
            $officeUniqueId = "";
        $agentUniqueId = self::createAgent($officeUniqueId);
        $xmlString = self::changeOfficeUniqueIdInXml($xmlString, $officeUniqueId);
        self::enablePropertyFeatures($officeUniqueId);
        return self::changeAgentUniqueIdInXml($xmlString, $agentUniqueId);
    }

    /**
     * This function is used in unit test. It will create a agent and embed the agent id in the xml string
     * @param $xmlString
     * @return string
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public static function embedPropertyId($xmlString): string
    {
        $officeUniqueId = "";
        $agentUniqueId = "";
        $propertyUniqueId = self::createProperty($officeUniqueId, $agentUniqueId);
        $xmlString = self::changeOfficeUniqueIdInXml($xmlString, $officeUniqueId);
        $xmlString = self::changeAgentUniqueIdInXml($xmlString, $agentUniqueId);
        return self::changePropertyUniqueIdInXml($xmlString, $propertyUniqueId);
    }

    public static function enablePropertyFeatures(string $officeUniqueId)
    {
        $em = PortalDb::getInstance()->getEntityManager();
        $office = $em->getRepository(\JosPortalOffices::class)->findOneBy(
            ["uniqueId" => $officeUniqueId]
        );
        require_once JPATH_ROOT . "/tests/php/websending/jos_portal_features.php";
        $lang = ["en", "th", "is"];

        Wfactory::getDb()->truncateTable(\JosPortalPropertyFeatures::class);

        /** @var array $jos_portal_features */
        foreach ($jos_portal_features as $feature) {
            $c = new \JosPortalPropertyFeatures();

            $c->setSagaFeatureId($feature['id']);

            $names = [];
            foreach ($lang as $l) {
                $names[$l] = $feature["name"];
            }
            $c->setFeatureName(json_encode($names, JSON_UNESCAPED_UNICODE));

            $types = [];
            foreach ($lang as $l) {
                $types[$l] = $feature["type"];
            }
            $c->setFeatureType(json_encode($types, JSON_UNESCAPED_UNICODE));
            $c->setOffice($office);

            $em->persist($c);
        }

        $em->flush();
    }


    static function isNullOrEmptyString($question)
    {
        if (is_array($question) && empty($question))
            return true;

        if ($question === null)
            return true;

        if (is_string($question)) {
            $question = trim($question);
            $strLength = strlen($question);
            return $strLength === 0;
        }
        return false;
    }


}