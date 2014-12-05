<?php $this->assign('title', 'Users list'); ?>

<?php if(!empty($users)): ?>
	<div class="hero-unit">
		<h1>Refugees</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>User</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						<?php foreach($users as $user): ?>
						<tr>
							<td><?php echo $user['User']['name']; ?></td>
							<td>Description : <?php echo $user['User']['description']; ?></td>
							<?php if ($user['Center']['name']): ?>
								<td>Currently at : <?php echo $user['Center']['name']; ?> | <?php echo $this->Html->link('See center details',
								array('controller' => 'centers', 'action' => 'view', 'id' => $user['Center']['id'], 'type' => $user['Center']['type'])); ?></td>
							<?php else: ?>
								<td>Not in a center</td>
							<?php endif; ?>
							<td>
								<?php 
								echo $this->Html->link(
									'View', 
									array(
										'controller' => 'users', 
										'action' => 'view', 
										'id' => $user['User']['id']
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
		<h1>No user</h1>
	</div>
<?php endif; ?>