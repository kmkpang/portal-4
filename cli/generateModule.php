<?php
/**
 * @package    Wfactory
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

use Webportal\Logger\PortalLogger;

$path2 = getcwd();

require_once $path2 . '/cliBootStrap.php';

/**
 * This script will generate database schema in libraries/webportal/db/entities
 * folder
 *
 * @since  4.0.0
 */
class GenerateModule extends JApplicationCli
{
    /**
     * Entry point for CLI script
     *
     * @return  void
     *
     * @since   4.0.0
     */
    public function doExecute()
    {
        global $arguments;

        PortalLogger::debug("Starting module generation with : " . json_encode($arguments), __LINE__, __FILE__);

        if ($arguments["name"]) {
            $name = trim($arguments["name"]);
            $moduleName = "mod_webportal_{$name}";
            $modulePath = JPATH_ROOT . DS . "modules" . DS . $moduleName;
            $tempPath = JPATH_ROOT . DS . "tmp" . DS . $moduleName;
            $srcPath = JPATH_ROOT . DS . "cli" . DS . "__module";
            if (JFolder::exists($modulePath)) {
                if (!$arguments["force"]) {
                    PortalLogger::fatal("Folder $modulePath already exists..if you want to overwrite it, run with --force option !", __LINE__, __FILE__);
                    exit(1);
                } else {
                    PortalLogger::warn("Folder $modulePath already exists. overwriting it", __LINE__, __FILE__);
                }
            }

            if (JFolder::exists($tempPath))
                JFolder::delete($tempPath);

            JFolder::copy($srcPath, $tempPath, '', true);
            $files = $this->getDirContents($tempPath);
            foreach ($files as $f) {
                if (is_file($f)) {
                    $file = $this->replaceModuleName($f, $name);
                    $content = $this->replaceModuleName(file_get_contents($f), $name);

                    file_put_contents($f, $content);
                    JFile::move($f, $file);
                }
            }
            JFolder::copy($tempPath, $modulePath, '', true, true);

            // now generate the tsx file
            $srcPath = JPATH_ROOT . DS . "cli" . DS . "__tsxContainer";
            $tempPath = JPATH_ROOT . DS . "tmp" . DS . "__tsx__" . $moduleName;
            if (JFolder::exists($tempPath))
                JFolder::delete($tempPath);

            $typescriptBase = JPATH_ROOT . DS . "media/com_webportal/ts/containers";
            JFolder::copy($srcPath, $tempPath, '', true);
            $files = $this->getDirContents($tempPath);
            foreach ($files as $f) {
                if (is_file($f)) {
                    $file = $this->replaceModuleName($f, $name);
                    $content = $this->replaceModuleName(file_get_contents($f), $name);

                    file_put_contents($f, $content);

                    $file = str_replace($tempPath,$typescriptBase,$file);
                    JFile::move($f, $file);
                }
            }

        } else  $this->printHelp();

    }

    private function replaceModuleName($string, $name)
    {
        $string = str_replace("{module_name}", $name, $string);
        $string = str_replace("{Module_name}", ucfirst($name), $string);
        $string = str_replace("lessfile", "less", $string);
        $string = str_replace("typescriptfile", "tsx", $string);
        return $string;
    }


    private function getDirContents($dir, &$results = array())
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if ($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }

    private function printHelp()
    {
        PortalLogger::debug(
            "Call me like this : php GenerateModule --name=properties
                                 This will generate a module named jos_portal_properties in the SITE_ROOT/modules folder",
            __LINE__, __FILE__);
    }
}


JApplicationCli::getInstance('GenerateModule')->execute();
