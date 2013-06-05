<div class="stations index">
	<h2><?php echo __('Stations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stations as $station): ?>
	<tr>
		<td><?php echo h($station['Station']['id']); ?>&nbsp;</td>
		<td><?php echo h($station['Station']['name']); ?>&nbsp;</td>
		<td><?php echo h($station['Station']['lat']); ?>&nbsp;</td>
		<td><?php echo h($station['Station']['lng']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $station['Station']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $station['Station']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $station['Station']['id']), null, __('Are you sure you want to delete # %s?', $station['Station']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('өмнөх'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('дараах') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Station'), array('action' => 'add')); ?></li>
	</ul>
</div>
