<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_messages
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die; 
$a = ['banner_bg1.png', 'banner_bg2.png'];
$selected = array_rand($a,1);
// <div class="alert alert-warning clearfix">
	// <a target="_blank" href="https://www.themexpert.com/quix-pagebuilder?utm_medium=button&utm_campaign=quix-pro&utm_source=joomla-admin" class="btn btn-primary pull-right">
	    // <php echo JText::_('COM_QUIX_GET_PRO_TITLE'); >
  	// </a>
	// <h4 class="alert-heading">
		// <php echo JText::_('COM_QUIX_FREE_NOTICE_TITLE'); >
	// </h4>
	// <p>
		// <php echo JText::_('COM_QUIX_FREE_NOTICE_DESC'); >
	// </p>
// </div>
?>
<div class="freewarning-banner" style="margin: 0 auto 20px;text-align: center;">
	<a target="_blank" href="https://www.themexpert.com/quix-pagebuilder?utm_medium=button&utm_campaign=quix-pro&utm_source=joomla-admin">
	    <img src="<?php echo JUri::root() . 'libraries/quix/assets/images/' . $a[$selected]; ?>">
  	</a>
</div>