 <?php $request = $this->request; ?>
 <div class="masthead">
    <h3 class="muted"><?php echo Configure::read('name'); ?></h3>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
        	<ul class="nav">
				<li class="<?php echo ($request->controller == 'users' && $request->action == 'index') ? 'active' : '' ?>">
					<?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'index','plugin' => NULL)); ?>
				</li>
				<?php if(AuthComponent::user('id')): ?>
					<?php echo $this->element('menuUser'); ?>
				<?php else: ?>
					<?php echo $this->element('menuAnonyme'); ?>
				<?php endif; ?>
			</ul>
        </div>
      </div>
    </div>
</div>