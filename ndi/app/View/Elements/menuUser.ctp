 <?php $request = $this->request; ?>
<li class="<?php echo ($request->controller == 'users' && $request->action == 'lists') ? 'active' : '' ?>">
<?php echo $this->Html->link('Users list', array('controller' => 'users', 'action' => 'lists','plugin' => NULL)); ?>
</li>
<li class="<?php echo ($request->controller == 'centers' && $request->action == 'index_1') ? 'active' : '' ?>">
<?php echo $this->Html->link('Centers of refugees', array('controller' => 'centers', 'action' => 'index_1','plugin' => NULL)); ?>
</li>
<li class="<?php echo ($request->controller == 'centers' && $request->action == 'index_2') ? 'active' : '' ?>">
<?php echo $this->Html->link('Donation centers', array('controller' => 'centers', 'action' => 'index_2','plugin' => NULL)); ?>
</li>
<?php if ($group == Configure::read('center_group')): ?>
	<li class="<?php echo ($request->controller == 'admincenters' && $request->action == 'index') ? 'active' : '' ?>">
		<?php echo $this->Html->link('Manage centers', array('controller' => 'admincenters', 'action' => 'index','plugin' => NULL)); ?>
	</li>
<?php endif; ?>
<li>
<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout','plugin' => NULL)); ?>
</li>