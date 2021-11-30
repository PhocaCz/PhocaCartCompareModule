<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die;

if ($p['module_description'] != '') {
	echo '<div class="ph-mod-desc">'.$p['module_description'].'</div>';
}
echo '<div id="phItemCompareBox" class="ph-compare-module-box'.$moduleclass_sfx .' phItemCompareBox">';
echo $compare->renderList();
echo '</div>';
echo '<div id="phContainerModuleCompare"></div>';

// Get count of items, count can be displayed e.g. in case the list is hidden
// Add it to DIV ID because it will be changed per AJAX
// $count = $compare->getComapareCountItems();
// echo '<div class="phItemCompareBoxCount" id="phItemCompareBoxCount">'. $compare->getComapareCountItems().'</div>';
?>


