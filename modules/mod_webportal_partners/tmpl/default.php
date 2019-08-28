<?php

use Webportal\PortalHelper;

/**
 * @var $params Joomla\Registry\Registry
 */
$p = PortalHelper::get_object_vars(json_decode($params->toString()));


//lang
$p["language"] = PortalHelper::getCurrentlySelectedLanguage(true);

//less variables
$less = array();
foreach ($p["less_variables_override"] as $key => $value) {
    if ($value["value_type"] === "color")
        $less[$value["less_variable_key"]] = $value["less_variable_color"];
    if ($value["value_type"] === "text")
        $less[$value["less_variable_key"]] = $value["less_variable_text"];
}
$p["less"]=$less;

$moduleParams = base64_encode(json_encode($p)); // this is the module parameter
$document = JFactory::getDocument();
/**
 * @var $webpackService \Webportal\Services\Webpack\WebpackService
 */
$webpackService = \Webportal\Services\Webpack\WebpackService::getInstance();
$webpackService->embedReactJsCss('modWebportalPartnersUi');
$moduleClassName = str_replace("_", "-", $module->module);
if (!PortalHelper::isNullOrEmptyString($params->get("moduleclass_sfx"))) {
    $moduleClassName = "$moduleClassName $moduleClassName-{$params->get("moduleclass_sfx")}";
}

?>

<div id="modWebportalPartnersUi" class="<?php echo $moduleClassName ?>" data-hint="<?php echo $moduleParams ?>"></div>
