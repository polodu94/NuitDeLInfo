 <?php $request = $this->request; ?>
<li class="<?php echo ($request->controller == 'users' && $request->action == 'login') ? 'active' : '' ?>">
<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login','plugin' => NULL)); ?>
</li>
<li class="<?php echo ($request->controller == 'users' && $request->action == 'signin') ? 'active' : '' ?>">
<?php echo $this->Html->link('Sign in', array('controller' => 'users', 'action' => 'signin','plugin' => NULL)); ?>
</li>