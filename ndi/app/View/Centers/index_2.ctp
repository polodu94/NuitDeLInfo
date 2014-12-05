<?php $this->assign('title', 'Centers list'); ?>
<?php if(!empty($centers)): ?>
	<div class="hero-unit">
		<h1>Refugee</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
						<?php foreach($centers as $center): ?>
						<tr>
							<td><?php echo $center['Center']['name']; ?></td>
							<td>Description : <?php echo $center['Center']['description']; ?></td>
							<td>
								<?php 
								echo $this->Html->link(
									'View', 
									array(
										'controller' => 'centers', 
										'action' => 'view', 
										'id' => $center['Center']['id'],
										'type' => $center['Center']['type']
										),
									array('class' => 'btn')
									); 
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-6"></div>
<div class="col-xs-6">
	<ul class="pagination">
		<?php
		echo $this->Paginator->first('< first', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->prev('prev', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>', 'modulus' => 6));
		echo $this->Paginator->next('next', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->last('last >', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		?>
	</ul>
</div>
<?php else: ?>
	<div class="hero-unit">
		<h1>No center</h1>
	</div>
<?php endif; ?>