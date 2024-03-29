<?php
/**
 * @version 2.2.2
 * @package JEM
 * @subpackage JEM Wide Module
 * @copyright (C) 2013-2017 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;


// get module helper
require_once(dirname(__FILE__).'/helper.php');

//require needed component classes
require_once(JPATH_SITE.'/components/com_jem/helpers/helper.php');
require_once(JPATH_SITE.'/components/com_jem/helpers/route.php');
require_once(JPATH_SITE.'/components/com_jem/classes/image.class.php');
require_once(JPATH_SITE.'/components/com_jem/classes/output.class.php');
require_once(JPATH_SITE.'/components/com_jem/factory.php');

JFactory::getLanguage()->load('com_jem', JPATH_SITE.'/components/com_jem');

$list = ModJemJoomlaLondonHelper::getList($params);

// check if any results returned
if (empty($list) && !$params->get('show_no_events')) {
	return;
}

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base(true).'/modules/mod_jem_joomla_london/tmpl/mod_jem_joomla_london.css');

require ModuleHelper::getLayoutPath('mod_jem_joomla_london', $params->get('layout', 'default'));