<?php
/**
 * @version    1.8.0
 * @package    com_quix
 * @author     ThemeXpert <info@themexpert.com>
 * @copyright  Copyright (C) 2015. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access

defined('_JEXEC') or die;
// Load jQUery
JHtml::_('jquery.framework');
// Load Bootstrap 3
JHtml::_('bootstrap.framework');
// Keep alive
JHtml::_('behavior.keepalive');

// Quix autoloader
jimport('quix.vendor.autoload');
$version = 'ver=' . QUIX_VERSION;

// // Builder css
JFactory::getDocument()->addStylesheet( QUIX_URL . '/assets/css/qxbs.css?'.$version );
JFactory::getDocument()->addStylesheet( QUIX_URL . '/assets/css/qx-fb.css?'.$version );
JFactory::getDocument()->addStylesheet( QUIX_URL . '/assets/css/qxui.css?'.$version );
JFactory::getDocument()->addStylesheet( QUIX_URL . '/assets/css/qxicon.css?'.$version );
JFactory::getDocument()->addStylesheet( QUIX_URL . '/assets/css/qxi.css?'.$version );
JFactory::getDocument()->addStylesheet( JUri::root() . 'media/jui/css/bootstrap.min.css?'.$version );


// Load js 
JFactory::getDocument()->addScript( QUIX_URL . '/assets/js/cookies.js?'.$version);
JFactory::getDocument()->addScript( JUri::root(true) . '/media/quix/assets/iframe.js?'.$version);
JFactory::getDocument()->addScript( QUIX_URL . '/assets/js/jquery-ui.js?'.$version);
JFactory::getDocument()->addScript( QUIX_URL . '/assets/js/jquery-scrollto.js?'.$version);
JFactory::getDocument()->addScript( QUIX_URL . '/assets/js/qxkit.js?'.$version);

// Summernote Editor
JFactory::getDocument()->addScript( QUIX_URL . '/assets/js/summernote.js?'.$version );
// Load Bootstrap as summernote fallback
JFactory::getDocument()->addScriptDeclaration(
"jQuery(window).load(function(){
  setTimeout(function(){
    if(typeof jQuery().tooltip != 'function'){
      var inlineScript = document.createElement('script');
      inlineScript.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js';
      document.head.appendChild(inlineScript);
      
      var inlineStyle=document.createElement('link');
      inlineStyle.rel='stylesheet';
      inlineStyle.href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css';
      document.head.appendChild(inlineStyle);
    }
  }, 2000)
});");
JFactory::getDocument()->addStyleDeclaration('
  #system-debug,
  .modal[aria-hidden="false"] {
    display: none;
  }
');
?>
<script type="text/javascript">
var quixHeartBeatApi = setInterval(function() {
  jQuery.ajax({
    url: "<?php echo JUri::root() . 'index.php?option=com_quix&task=live&' . JSession::getFormToken() . '=1';?>", 
    success: function(result){ // success
      try{ 
        data = JSON.parse(result);
        if(data.success === true){
          return true;
        }
        else
        {
          jQuery('#quixBuilderLoadingFailedTitle').html('Your session has expired!');
          jQuery('#quixBuilderLoadingFailed .qx-modal-body div').html('<p>Due to Joomla! session timeout, you can not save your page at this point. To avoid this, increase your session timeout from <strong>Global Configuration</strong> page. Now, You have to reload the page and login again.</p>');
          jQuery('#quixBuilderLoadingFailed').modal({
            
          });
          clearTimeout(quixHeartBeatApi);
        }
      } catch (err) {
        console.warn("An error occured: " + err.message);
      }
    },
    error: function(xhr){ // error
      console.warn("An error occured: " + xhr.status + " " + xhr.statusText);
    }
  });
}, 1000 * 30 * 1); // every minute
jQuery(window).bind("load", function() { 
  jQuery(".preloader").delay(1000000000).fadeOut('slow');
});

window.FILE_MANAGER_ROOT_URL = "<?php echo JURI::root() . 'images/' ?>"

</script>
<!-- Builder loading failed message -->
<div class="qx-modal fade" id="quixBuilderLoadingFailed" tabindex="-1" role="dialog" aria-labelledby="quixBuilderLoadingFailed" aria-hidden="true">
  <div class="qx-modal-dialog qx-modal-dialog-centered" role="document">
    <div class="qx-modal-content">
      <div class="qx-modal-header">
        <h5 class="qx-modal-title" id="quixBuilderLoadingFailedTitle">Something went wrong!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="qx-modal-body">
        <div class="qx-alert qx-alert-danger">
          <p>
            Please check
            <a href="https://www.themexpert.com/docs/quix/getting-started/requirements" target="_blank">
              Quix System Requirements
            </a>
            and follow the 
            <a 
              href="https://www.themexpert.com/docs/quix/tutorials/how-to-fix-quix-pages-loading-problem-on-your-website" 
              target="_blank">
              Troubleshooting Guide
            </a> 
            to fix the issue. If necessary contact our support to check the issue for you.
          </p>
          <?php $max_time = ini_get("max_execution_time"); ?>
          <?php if($max_time < 300): ?>
          <p class="qx-alert qx-alert-warning">
            Your PHP settings <strong>max_execution_time</strong> is low <strong><?php echo $max_time ?></strong>. Please increase it to mininum <strong>300</strong>.
          </p>
          <?php endif; ?>
        </div>
      </div>
      <div class="qx-modal-footer">
        <button onclick="location.reload();" class="qx-btn qx-btn-success qx-btn-sm">Reload</button>
        <button onclick="window.history.back();" class="qx-btn  qx-btn-info qx-btn-sm">Back</button>
      </div>
    </div>
  </div>
</div>

<!-- Preloader -->
<div class="preloader">
  <div class="wrap">
    <div class="ball"></div>
    <div class="ball"></div>
    <div class="ball"></div>
    <div class="ball"></div>
  </div>
  <p id="loaderMessage">
    Initializing Builder
  </p>
  <p class="qx-hints hide qx-hide text-hide"><?php echo QuixFrontendHelper::getHints(); ?></p>
</div>
<!-- Preloader -->
<?php 
$iframeUrl = JUri::root() . 'index.php?option=com_quix&view=form&layout=iframe&builder=frontend&type='.$this->type.'&id=' . (int) $this->item->id . (JFactory::getApplication()->input->get('output', 'component') == 'component' ? '&tmpl=component' : '' );
?>
<div class="qx-fb-frame">

  <div id="qx-fb-frame-toolbar"></div>
  <div class="qx-fb-frame-preview" data-preview="desktop">
    
    <div class="qx-fb-frame-preview-responsive-wrapper">
      <iframe
        src="<?php echo $iframeUrl; ?>" 
        frameborder="0"
        style="width:100%;height: 100vh;margin-top: 53px; padding-bottom: 53px;"
        name="quixframe"
        id="quix-iframe-wrapper"
        <?php if($this->config->get('fix_iframeloading', 0)): ?>
        sandbox="allow-top-navigation-by-user-activation allow-forms allow-popups allow-modals allow-pointer-lock allow-same-origin allow-scripts"
        <?php endif; ?>
        allowfullscreen="1">
      </iframe>        
    </div>
  
  </div>
  <form 
    action="<?php echo JRoute::_('index.php?option=com_quix&view='.$this->type.'&id=' . (int) $this->item->id); ?>"
    method="post" enctype="multipart/form-data" 
    name="adminForm" 
    id="adminForm" 
    class="qx-fb form-validate" style="display: none;">
    <input type="hidden" name="jform[id]" id="jform_id" value="<?php echo $this->item->id; ?>" />
    <input type="hidden" id="jform_Itemid" value="<?php echo $this->Itemid;?>" />

    <input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
    <input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
    <input type="hidden" id="jform_task" name="task" value="" />
    <input type="hidden" id="jform_type" name="type" value="<?php echo $this->type ?>" />
    <input type="hidden" id="jform_return" name="return" value="<?php echo base64_encode(JRoute::_('index.php?option=com_quix&view='.$this->type.'&id=' . (int) $this->item->id . ($this->Itemid ? '&Itemid=' . $this->Itemid : ''))); ?>" />
    
    <?php if(isset($this->item->type)): ?>
      <input type="hidden" id="jform_template_type" name="jform[type]" value="<?php echo $this->item->type ?>" />
    <?php endif; ?>

    <input type="hidden" id="jform_builder_version" name="jform[builder_version]" value="<?php echo $this->item->builder_version ?>" />
    <input type="hidden" id="jform_token" name="<?php echo JSession::getFormToken(); ?>" value="1" />

  </form>
</div>