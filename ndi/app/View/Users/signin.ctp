<?php $this->assign('title', 'Sign in'); ?>
<?php $this->Html->css('signin', array('inline' => false)); ?>
<div class="container">
	<?php echo $this->Form->create('User', array('type' => 'post', 'class' => 'form-signin')); ?>
	<h2 class="form-signin-heading">Sign in</h2>
	<?php echo $this->Form->input('pseudo', array('label' => 'Pseudo', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('password', array('label' => 'Password', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('password2', array('label' => 'Confirm Password', 'type' => 'password', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('email', array('label' => 'Email', 'class' => 'input-block-lelvel')); ?>
    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
	<?php echo $this->Form->end(); ?>
</div>