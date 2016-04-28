<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
 
defined('_JEXEC') or die('Restricted access');// no direct access

if (!JComponentHelper::isEnabled('com_phocacart', true)) {
	$app = JFactory::getApplication();
	$app->enqueueMessage(JText::_('Phoca Cart Error'), JText::_('Phoca Cart is not installed on your system'), 'error');
	return;
}
if (! class_exists('PhocaCartLoader')) {
    require_once( JPATH_ADMINISTRATOR.'/components/com_phocacart/libraries/loader.php');
}
phocacartimport('phocacart.render.renderjs');
phocacartimport('phocacart.compare.compare');
phocacartimport('phocacart.category.categorymultiple');
PhocaCartRenderJs::renderAjaxRemoveFromCompare();

$compare	= new PhocaCartCompare();
echo '<div id="phItemCompareBox">';
echo $compare->renderList();
echo '</div>';
echo '<div id="phContainerModuleCompare"></div>';
require(JModuleHelper::getLayoutPath('mod_phocacart_compare'));
?>