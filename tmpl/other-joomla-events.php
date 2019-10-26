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
?>

<div class="<?php echo$moduleName; ?> <?php echo $params->get('moduleclass_sfx')?> other-joomla-events" id="<?php echo$moduleName; ?>">
<?php if (count($list)) : ?>
		<?php foreach ($list as $item) : ?>


			<div class="<?php echo $moduleName; ?>--outerDiv">
				<div class="jem-initial-details">
					<div class="jem-event-image">
						<!-- IMAGE or Attractive looking "this month you are going to get value because X".  e.g. speaker. topic.  etc. -->
						<a href="<?php echo $item->eventlink; ?>">
							<img src="<?php  echo $item->eventimageorig; ?>" alt="<?php echo $item->fulltitle; ?>">
							<div class="image-title">
								<?php echo $item->fulltitle; ?>
							</div>
						</a>
					</div>
					<div class="jem-date">
						<?php echo date('l jS F', strtotime($item->date)); ?>, 
						<span class="jem-time">
							<?php 
								echo date('h:ia', strtotime($item->time));
							?>
						</span>										
					</div>
					<div class="jem-buttons bg-yellow">
						<a class="button">Register to Attend</a> 
						<a href="<?php echo $item->eventlink; ?>" target="_blank" class="button yellow">Get Directions</a> 
					</div>		
				</div>
			</div>		
		<?php endforeach; ?>
	</table>
<?php else : ?>
	<?php echo JText::_('MOD_JEM_WIDE_NO_EVENTS'); ?>
<?php endif; ?>
</div>