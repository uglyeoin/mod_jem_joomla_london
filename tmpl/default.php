<?php
/**
 * @version 2.2.2
 * @package JEM
 * @subpackage JEM joomla_london Module
 * @copyright (C) 2013-2017 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

$moduleName = $module->module;

$mediaUrl = 'media/' . $moduleName;
if (file_exists($mediaUrl . '/css/drawer.css') && (filesize($mediaUrl . '/css/drawer.css') > 0))
{
	$document = JFactory::getDocument();
	$document->addStyleSheet($mediaUrl . '/css/drawer.css', array('version' => 'auto'));
}

if (file_exists($mediaUrl . '/js/vanilla-js-drawer.js') && (filesize($mediaUrl . '/js/vanilla-js-drawer.js') > 0))
{
	$document = JFactory::getDocument();
	$document->addScript($mediaUrl . "/js/vanilla-js-drawer.js", "text/javascript", true, false, array('version' => 'auto'));
}
?>


<div class="<?php echo$moduleName; ?> <?php echo $params->get('moduleclass_sfx')?>" id="<?php echo$moduleName; ?>">

<?php if (count($list)) : ?>
		<?php foreach ($list as $item) : ?>

			<?php 
				// echo "<pre>";
				// print_r($item);
				// echo "</pre>";
			?>


			<div class="<?php echo $moduleName; ?>--outerDiv">
				<div class="jem-initial-details">
					<div class="jem-event-image">
						<!-- IMAGE or Attractive looking "this month you are going to get value because X".  e.g. speaker. topic.  etc. -->
						<a href="<?php echo $item->eventlink; ?>">
							<img src="<?php  echo $item->eventimageorig; ?>" alt="<?php echo $item->title; ?>">
						</a>
					</div>
					<div class="jem-event-countdown">
						<?php $document->loadRenderer('modules')->render("JemCountdownTimer"); ?>
					</div>		
					<div class="jem-date">
						<?php  echo $item->dateinfo; ?>
					</div>
					<div class="jem-date">
						<a class="button ui-btn ui-menu-open">Register to Attend</a> 
						<a href="/find-joomla-london" target="_blank" class="button">Get Directions</a> 
					</div>		
				</div>
				<div class="ui-nav ui-nav-mobile more-information">
					<div class="g-content">
					<a class="ui-btn ui-menu-close">Close <i class="fa fa-close" aria-label="Close dialog"></i></a>  				
						<div class="jem-popout">
							<div class="jem-registration-form">
								<?php $document->loadRenderer('modules')->render("JemRegistrationForm"); ?>
							</div>
							<!--
							<div class="jem-more-information">
								<?php  // echo $item->eventdescription; ?>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>		
		<?php endforeach; ?>
	</table>
<?php else : ?>
	<?php echo JText::_('MOD_JEM_WIDE_NO_EVENTS'); ?>
<?php endif; ?>
</div>