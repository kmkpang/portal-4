<?php

$document = JFactory::getDocument();

/**
 * @var $webpackService \Webportal\Services\Webpack\WebpackService
 */
$webpackService = \Webportal\Services\Webpack\WebpackService::getInstance();
$webpackService->embedReactJsCss('settingsUi');


?>
<div id="settingsUi"></div>

