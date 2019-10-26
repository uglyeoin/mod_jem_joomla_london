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

use Joomla\CMS\Factory;

$moduleName = $module->module;

$document = Factory::getApplication()->getDocument();

?>


<div class="<?php echo$moduleName; ?> <?php echo $params->get('moduleclass_sfx')?>" id="<?php echo$moduleName; ?>">

<?php if (count($list)) : ?>
		<?php foreach ($list as $item) : ?>

			<div class="<?php echo $moduleName; ?>--outerDiv">
				<div class="jem-initial-details">
					<p><?php echo JText::_("OUR_NEXT_MEETING_IS");?></p>
					<div class="countdown-timer">
						<?php 
							$position = "jem-countdown-timer";
							echo Factory::getApplication()->getDocument()->loadRenderer('modules')->render($position); 
						?>
					</div>
					<div class="jem-event-image">
						<!-- IMAGE or Attractive looking "this month you are going to get value because X".  e.g. speaker. topic.  etc. -->
						<a href="<?php echo $item->eventlink; ?>">
							<img src="<?php  echo $item->eventimageorig; ?>" alt="<?php echo $item->fulltitle; ?>">
							<div class="image-title">
								<h2>
									<?php echo $item->fulltitle; ?>
								</h2>
							</div>
						</a>
					</div>
					<div class="jem-date">
						<?php echo $item->date; ?>, 
						<span class="jem-time">
							<?php 
								echo $item->time;
							?>
						</span>										
					</div>
					<div class="jem-buttons bg-yellow">
						<a class="button ui-btn ui-menu-open red"><?php echo JText::_("REGISTER_TO_ATTEND");?></a> 
						<a href="/find-joomla-london" target="_blank" class="button yellow"><?php echo JText::_("GET_DIRECTIONS");?></a> 
					</div>		
				</div>
				<div class="ui-nav ui-nav-mobile more-information">
					<div class="g-content">
					<a class="ui-btn ui-menu-close button">Close <i class="fa fa-close" aria-label="Close dialog"></i></a>  				
						<div class="jem-popout">
							<div class="jem-registration-form">
								<?php 
									$position = "jem-registration-form";
									echo Factory::getApplication()->getDocument()->loadRenderer('modules')->render($position); 
								?>	
							</div>
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

<?php
	$mediaUrl = 'media/' . $moduleName;
	if (file_exists($mediaUrl . '/css/drawer.css') && (filesize($mediaUrl . '/css/drawer.css') > 0))
	{
		$document->addStyleSheet($mediaUrl . '/css/drawer.css', array('version' => 'auto'));
	}

	if (file_exists($mediaUrl . '/js/vanilla-js-drawer.js') && (filesize($mediaUrl . '/js/vanilla-js-drawer.js') > 0))
	{
		$document->addScript($mediaUrl . "/js/vanilla-js-drawer.js", "text/javascript", true, false, array('version' => 'auto'));
	}
?>