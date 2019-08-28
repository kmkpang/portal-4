<?php

/**
 * getting user agent from mobil detector
 */
function getUserAgent()
{
    $device = new Mobile_Detect();
    $UserAgent = $device->getUserAgent();
    $UserAgent = explode('(', $UserAgent);
    $UserAgent = explode(';', $UserAgent[1]);
    $UserAgent = str_replace(' ', '_', strtolower(trim($UserAgent[0])));

    return str_replace('.', '_', $UserAgent);
}

/**
 * Quix render item
 */
function quixRenderItem($item)
{
    $config = JComponentHelper::getParams('com_quix');
    $optimize_css = $config->get('optimize_css', 1);
    $optimize_js = $config->get('optimize_js', 1);

    if (JDEBUG)
    {
        \JProfiler::getInstance('Application')->mark('Before QuixRenderItem');
    }
    //---------------------
    // _prepareAssets function
    //---------------------
    jimport('quix.app.init');
    // Assets::resetObject(); // commented as child render can reset and parent will loose styles

    // getting data from item else setting default data
    // for old section data, has no object of item
    if (isset($item->data)) {
        $data = $item->data;
    } else {
        $data = $item;

        $item = new stdClass();
        $item->id = 0;
        $item->type = 'section';
        $item->builder = 'classic';
        $item->params = '';
        $item->builder_version = '';
        $item->modified = '';
    }

    global $QuixBuilderType;
    $QuixBuilderType = $item->builder;

    global $responsiveBreakPoints;
    $responsiveBreakPoints = [];

    // load global styles code
    $registry = new \Joomla\Registry\Registry;
    $params = $registry->loadString($item->params);
    $code = $params->get('style', '');
    $registry = new \Joomla\Registry\Registry;
    $params = $registry->loadString($item->params);
    global $isImageOptimized;
    $isImageOptimized = $params->get('image_optimized', false);

    global $userWantWebp;
    $userWantWebp = $params->get('enabled_webp_support', true);

    global $userWantOptimization;
    $userWantOptimization = $params->get('enabled_image_optimization', true);

    // user agent
    $UserAgent = getUserAgent();
    if (JDEBUG)
    {
        \JProfiler::getInstance('Application')->mark('Before loading core CSS (' . $item->builder . ')');
    }
    if ($item->builder == 'classic') {
        
    } else {
        
    }
    if (JDEBUG)
    {
        \JProfiler::getInstance('Application')->mark('After loading core CSS (' . $item->builder . ')');
    }
    //---------------------
    // end of _prepareAssets function
    //---------------------
    // get rander type
    $type = (isset($item->type) ? $item->type : 'section');

    // set builder type ( frontend or classic )
    $quix = quix();
    $quix->getEngineTracker()->set($item->id, $type, $item->builder);

    $currentTime = JFactory::getDate()->Format('%Y-%m-%d - %H:%M');
    $pageModifiedTimeStamp = (isset($item->modified) ? $item->modified : $currentTime);

    $app = \JFactory::getApplication();
    $document = \JFactory::getDocument();

    if (is_string($data)) {
        $data = json_decode($data, true);
    }

    global $responsiveImageFileName;
    $responsiveImageFileName = $item->id . '-' . $type;

    // test do.
    require_once JPATH_SITE . '/administrator/components/com_quix/helpers/images.php';
    $model = \QuixHelperImages::get($item->id, $type);

    global $responsiveImagesMapper;
    $responsiveImagesMapper = [];

    if (!is_null($model)) {
        $responsiveImagesMapper = json_decode($model->params, true);
    }
    
    // if($item->id == 38){
    //     print_r($item);die;
    // }
    $user = JFactory::getUser();
    $canCreateRecords = $user->authorise('core.edit', 'com_quix') || count($user->getAuthorisedCategories('com_quix', 'core.edit')) > 0;
    
    ob_start(); ?>
    <div class="qx quix<?php echo ($canCreateRecords) ? ' qx-can-edit' : '' ?>">
    
    <?php
    if ($item->builder != 'classic' && $canCreateRecords && $type == 'page') :
      $link = 'index.php?option=com_quix&task=page.edit&id=' . $item->id; ?>
      <a class="qx-btn qx-btn-edit" href="<?php echo JRoute::_($link); ?>" class="label">Edit Page</a>
    <?php endif; ?>

    <div class="qx-inner <?php echo $UserAgent; ?> <?php echo $QuixBuilderType, ' qx-type-'.$item->type, ' qx-item-'.$item->id; ?>">

    <?php
    $title = JFilterOutput::stringURLSafe($item->title);
    $itemCacheName = "{$type}-{$item->id}-{$title}-{$item->builder}";
    if ($item->builder == 'frontend') {
        
        if (JDEBUG)
        {
            \JProfiler::getInstance('Application')->mark('Before loading styles (' . $item->builder . ')');
        }
        // visual builder codes start
        
        $compiledCss = "{$type}-{$item->id}-{$title}-{$item->builder}-{$item->builder_version}.css";
        $compiledJs = "{$type}-{$item->id}-{$title}-{$item->builder}-{$item->builder_version}.js";
        /** loading style */
        if ( $optimize_css && is_compiled_css_exists($compiledCss) ) {
            loadLiveBuilderPreviewAssets(false);
            plgSystemQuix::addQuixTrapCSSfrontend();
            $document->addStyleSheet(JUri::root(true) . '/media/quix/frontend/css/' . $compiledCss);
            $fontFamilies = JPATH_BASE . '/media/quix/frontend/css/' . $compiledCss . '.font-families';

            if (file_exists($fontFamilies)) {
                $fontsArray = file_get_contents($fontFamilies);

                if (strlen($fontsArray) > 2) {
                    // loaded based on google fonts existance
                    $document->addScript('https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js');
                    $document->addScriptDeclaration("if(typeof(WebFont) !== 'undefined'){WebFont.load({google: {families: " . $fontsArray . '}});}');
                }
            }
        } elseif(is_compiled_css_exists($compiledCss)) {
            loadLiveBuilderPreviewAssets(false);
            plgSystemQuix::addQuixTrapCSSfrontend();
            
            $cssCotent = file_get_contents(JPATH_SITE . '/media/quix/frontend/css/' . $compiledCss);
            if($cssCotent) $document->addStyleDeclaration($cssCotent);
            

            $fontFamilies = JPATH_BASE . '/media/quix/frontend/css/' . $compiledCss . '.font-families';

            if (file_exists($fontFamilies)) {
                $fontsArray = file_get_contents($fontFamilies);

                if (strlen($fontsArray) > 2) {
                    // loaded based on google fonts existance
                    $document->addScript('https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js');
                    $document->addScriptDeclaration("if(typeof(WebFont) !== 'undefined'){WebFont.load({google: {families: " . $fontsArray . ' }});}');
                }
            }
        } else {
            if (JDEBUG)
            {
                \JProfiler::getInstance('Application')->mark('Before compiling styles (' . $item->builder . ')');
            }

            loadLiveBuilderPreviewAssets();
            plgSystemQuix::addQuixTrapCSSfrontend();

            // loaded without condition as we did not check if we have google font or not
            // after first load we need that condition
            $document->addScript('https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js');
            
            
            Assets::bulkJsMinifier($pageModifiedTimeStamp . '-style', "(function(){
            {$quix->getStyleRenderer()->render($data, null, $item->builder) }
            }());", $type, $item->id);

            Assets::load($item->builder);

            if (JDEBUG)
            {
                \JProfiler::getInstance('Application')->mark('After compiling styles (' . $item->builder . ')');
            }
            $token = JSession::getFormToken();
            $document->addScriptDeclaration(";if(typeof loadGlobalStyles == 'function') loadGlobalStyles($code);");
            $document->addScriptDeclaration(";jQuery(window).load(function(){Assets.storeCompiledCss('$compiledCss', '$token');});");
        }
        if (JDEBUG)
        {
            \JProfiler::getInstance('Application')->mark('After loading styles (' . $item->builder . ')');
        }

        /** loading script */
        if ($optimize_js && is_compiled_js_exists($compiledJs)) {
            $document->addScript(JUri::root(true) . '/media/quix/frontend/js/' . $compiledJs);
        } elseif(is_compiled_js_exists($compiledJs)) {
            $jsCotent = file_get_contents(JPATH_SITE . '/media/quix/frontend/js/' . $compiledJs);
            if (strlen($jsCotent) > 2) $document->addScriptDeclaration($jsCotent);
        } else {
            $scripts = "(function(){
            {$quix->getScriptRenderer()->render($data, null, $item->builder) }
            }());";

            file_put_contents(get_compiled_js_path() . "{$compiledJs}", $scripts);

            Assets::bulkJsMinifier($pageModifiedTimeStamp . '-script', $scripts, $type, $item->id);
            Assets::load($item->builder);
        }

        // ======= visual builder codes end
    } else {
        // classic builder codes start
        loadClassicBuilderPreviewAssets();
        plgSystemQuix::addQuixTrapCSSclassic();

        $webFontsRenderer = $quix->getWebFontsRenderer();
        $fonts = $webFontsRenderer->getUsedFonts($data);
        $fontsWeight = $webFontsRenderer->getUsedFontsWeight();

        Assets::bulkCssMinifier(
            $pageModifiedTimeStamp,
            $quix->getStyleRenderer()->render($data, null, $item->builder),
            $type,
            $item->id
        );

        if (count($fonts)) {
            /**
             * Dynamically generate font families name string.
             */
            $fontFamilies = '';

            $count = count($fonts);

            foreach ($fonts as $font) {
                $weights = isset($fontsWeight[$font])
                          ? ':' . implode(',', $fontsWeight[$font])
                          : '';

                if ($count > 1) {
                    $fontFamilies .= "'{$font}" . $weights . "', ";
                } else {
                    $fontFamilies .= "'{$font}" . $weights . "'";
                }
                $count-- ;
            }

            if (!empty($fontFamilies)) {
                $document->addScript('https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js');
                $document->addScriptDeclaration("if(typeof(WebFont) !== 'undefined'){WebFont.load({google: {families: [" . $fontFamilies . ']}});}');
            }
        }
        // classic builder codes ends
    } ?>
    <?php 
    if (JDEBUG)
    {
        \JProfiler::getInstance( 'Application' )->mark( 'Before making view (' . $item->builder . ')' );
    } 
    ?>

    <?php echo $quix->getViewRenderer()->render($data, null, $item->builder); ?>
    
    <?php 
    if (JDEBUG)
    {
        \JProfiler::getInstance('Application')->mark('After making view (' . $item->builder . ')');
    } 
    ?>
    </div>
  </div>
  <?php

    // load assets
    Assets::load($item->builder);
    if ($item->builder == 'frontend' && !empty($code)) {
        $document->addScriptDeclaration(";(function(){ if(typeof loadGlobalStyles == 'function') loadGlobalStyles($code); })();");
    }

    if (JDEBUG)
    {
        \JProfiler::getInstance('Application')->mark('After QuixRenderItem');
    }
    // get content
    return ob_get_clean();
}
