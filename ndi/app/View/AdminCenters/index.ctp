<?php if(!$centers): ?>
	<div class="hero-unit">
		<h1>No centers</h1>
	</div>
	<?php echo $this->Html->link('Add one ?', array('controller' => 'admincenters', 'action' => 'add'), array('class' => 'btn-primary btn')); ?>
<?php else: ?>
	<div class="hero-unit">
		<h1>Wich center do you want to manage ?</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>Name</th>
						</tr>
						<?php foreach($centers as $center): ?>
						<tr>
							<td>
							<?php echo $center['Center']['name']; ?><?php echo $this->Html->link('Edit', 
							array('controller' => 'admincenters', 'action' => 'edit', 'id' => $center['Center']['id']), array('class' => '<btp-primary btn')); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<?php echo $this->Html->link('Add one ?', array('controller' => 'admincenters', 'action' => 'add'), array('class' => 'btn-primary btn')); ?>
<?php endif; ?>