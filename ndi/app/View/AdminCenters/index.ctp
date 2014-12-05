<?php if(!$centers): ?>
	<div class="hero-unit">
		<h1>No centers</h1>
	</div>
	<?php echo $this->Html->link('Add one ?', array('controller' => 'admincenters', 'action' => 'add'), array('class' => 'btn-primary btn')); ?>
<?php else: ?>
	<div class="hero-unit">
		<h1>Wich center do you want to manage ?</h1>
	</div>
	<ul>
		<?php foreach($centers as $center): ?>
			<li><p><?php echo $center['Center']['name']; ?></p><?php echo $this->Html->link('Edit', 
			array('controller' => 'admincenters', 'action' => 'edit', 'id' => $center['Center']['id']), array('class' => 'btp-primary btn')); ?><?php echo $this->Html->link('Manage', array('controller' > 'admincenters', 'action' => 'manage', 'id' => $center['Center']['id']), array('class' => 'btp-primary btn')); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php echo $this->Html->link('Add one ?', array('controller' => 'admincenters', 'action' => 'add'), array('class' => 'btn-primary btn')); ?>
<?php endif; ?>