 <?php $request = $this->request; ?>
 <ul class="sidebar-menu">
	<li class="<?php echo ($request->controller == 'users' && $request->action == 'index') ? 'active' : '' ?>">
 		<?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'index','plugin' => NULL)); ?>
	</li>
 	<?php if(AuthComponent::user('id')): ?>
 	<?php echo $this->element('menuUser'); ?>
 <?php else: ?>
 <?php echo $this->element('menuAnonyme'); ?>
<?php endif; ?>
</ul>
