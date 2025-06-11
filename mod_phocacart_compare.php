<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

defined('_JEXEC') or die;// no direct access

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Helper\ModuleHelper;

$app = Factory::getApplication();

if (!ComponentHelper::isEnabled('com_phocacart', true)) {
	$app->enqueueMessage(Text::_('Phoca Cart Error'), Text::_('Phoca Cart is not installed on your system'), 'error');
	return;
}
if (file_exists(JPATH_ADMINISTRATOR . '/components/com_phocacart/libraries/bootstrap.php')) {
	// Joomla 5 and newer
	require_once(JPATH_ADMINISTRATOR . '/components/com_phocacart/libraries/bootstrap.php');
} else {
	// Joomla 4
	JLoader::registerPrefix('Phocacart', JPATH_ADMINISTRATOR . '/components/com_phocacart/libraries/phocacart');
}

/*
if (! class_exists('PhocacartLoader')) {
    require_once( JPATH_ADMINISTRATOR.'/components/com_phocacart/libraries/loader.php');
}
phocacartimport('phocacart.path.route');
phocacartimport('phocacart.render.renderjs');
phocacartimport('phocacart.compare.compare');
phocacartimport('phocacart.category.categorymultiple');*/

$lang = Factory::getLanguage();
//$lang->load('com_phocacart.sys');
$lang->load('com_phocacart');

$media = PhocacartRenderMedia::getInstance('main');
$media->loadBase();
$media->loadBootstrap();
$media->loadSpec();
$s = PhocacartRenderStyle::getStyles();

$p['module_description']	= $params->get( 'module_description', '' );
$moduleclass_sfx 			= htmlspecialchars((string)$params->get('moduleclass_sfx', ''), ENT_COMPAT, 'UTF-8');


PhocacartRenderJs::renderAjaxRemoveFromCompare();

$compare	= new PhocacartCompare();
require(ModuleHelper::getLayoutPath('mod_phocacart_compare', $params->get('layout', 'default')));
?>
