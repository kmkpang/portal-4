<?php
/**
 * @package    Quix
 * @author    ThemeXpert http://www.themexpert.com
 * @copyright  Copyright (c) 2010-2015 ThemeXpert. All rights reserved.
 * @license  GNU General Public License version 3 or later; see LICENSE.txt
 * @since    1.0.0
 */

defined( '_JEXEC' ) or die;

require_once JPATH_SITE . '/administrator/components/com_quix/helpers/quix.php';

class PlgButtonQuix extends JPlugin {
  /**
   * Load the language file on instantiation.
   *
   * @var    boolean
   * @since  3.1
   */
  protected $autoloadLanguage = true;

  public function onDisplay( $name, $asset, $author ) 
  {
    require_once JPATH_SITE . '/components/com_quix/helpers/editor.php';

    $app = JFactory::getApplication();
    $input = $app->input;
    $user  = JFactory::getUser();

    $canMove = false;
    if ($user->authorise('core.create', 'com_quix')
      || $user->authorise('core.edit', 'com_quix')
      || $user->authorise('core.edit.own', 'com_quix')
      || $user->authorise('core.manage', 'com_quix'))
    {
      $canMove = true;
    }

    if(!$canMove) return;

    // view=collections
    if($app->isAdmin()){
      $link = 'index.php?option=com_quix&amp;task=modal&amp;' . JSession::getFormToken() . '=1';
    }else{
      $link = 'index.php?option=com_quix&amp;view=collections&amp;layout=modal&amp;' . JSession::getFormToken() . '=1';
    }

    $doc = JFactory::getDocument();    
    $doc->addScript( JUri::root( false ) . "libraries/quix/assets/js/lodash.min.js" );
    $doc->addScript( JUri::root( false ) . "libraries/quix/assets/js/shortcode-parser.js" );
    $doc->addScript( JUri::root( false ) . "libraries/quix/assets/js/shortcode.js" );
    $doc->addScript( JUri::root( false ) . "libraries/quix/assets/js/collection.js" );
    $doc->addScript( JUri::root( false ) . "libraries/quix/assets/js/jquery.magnific-popup.js" );
    $doc->addStyleSheet( JUri::root( false ) . "libraries/quix/assets/css/magnific-popup.css" );
    $doc->addStyleSheet( JUri::root( false ) . "libraries/quix/assets/css/spinner.css" );
    $doc->addStyleSheet( JUri::root( false ) . "administrator/components/com_quix/assets/editor.css" );
    $doc->addScript( JUri::root( false ) . "administrator/components/com_quix/assets/editor.js" );

    $doc->addStyleDeclaration( '
      .mfp-iframe-scaler iframe{
        background: #edecee;
      }
      .mfp-iframe-holder .mfp-content {
        line-height: 0;
        max-width: 800px;
        height: 500px;
        transition: all 0.2s linear;
      }
      .mfp-iframe-holder .mfp-content.qx-editor {
        max-width: 1200px;
        height: 600px;
      }
    ' );
    $doc->addScriptDeclaration( "window.quixEditorID = '$name';" );

    $a_id = $input->get('a_id', 0);
    $sid = $input->get('id', $a_id);
    $doc->addScriptDeclaration( "window.quixEditorItemID = '".$sid . "';" );
    $source = $input->get('option') .'.'. $input->get('view');
    $getQeditor = QuixHelperEditor::getInfo($source, $sid);
    if(isset($getQeditor->id) and $getQeditor->status){
      $doc->addScriptDeclaration( "window.builtWithQuixEditor = true;" );
      $doc->addScriptDeclaration( "window.quixEditorMapID = '".$getQeditor->id . "';" );
      $url = JUri::root() . 'index.php?option=com_quix&task=collection.edit&id='.$getQeditor->collection_id.'&quixlogin=true';
    }else{
      $doc->addScriptDeclaration( "window.quixEditorMapID = " . (isset($getQeditor->id) ? $getQeditor->id : 0) . ";" );
      $doc->addScriptDeclaration( "window.builtWithQuixEditor = false;" );
      $url = JUri::root() . 'index.php?option=com_quix&task=api.getEditor&source='.$source.'&sid='.$sid.'&quixlogin=true';
    }
    $doc->addScriptDeclaration( "window.quixEditorUrl = '".$url . "';" );

    // view=collections
    if($app->isSite()){
     return;
    }

    $button = new JObject;
    $button->class = 'btn qx-btn';
    $button->link = $link;
    $button->text = JText::_( 'PLG_EDITORS-XTD_QUIX_QUIX_TITLE' );
    $button->name = 'cube quix-icon qx-btn';
    $button->modal = true;
    $button->options = "{handler: 'iframe', size: {x: 800, y: 500}}";

    return $button;
  }
}
