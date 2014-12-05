<?php $this->assign('title', 'Login'); ?>
<?php $this->Html->css('signin', array('inline' => false)); ?>
<div class="container">
		<?php $this->assign('title', 'Sign in'); ?>
	<?php $this->Html->css('signin', array('inline' => false)); ?>
	<div class="container">
		<div class="form-box" id="login-box">
			<div class="header">Login</div>
			<?php echo $this->Form->create('User', array('type' => 'post', 'class' => 'form-signin')); ?>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->input('pseudo', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Pseudo')); ?>
				</div>
			</div>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Password')); ?>
				</div>
			</div>
			<div class="footer">  
				<button class="btn bg-olive btn-block" type="submit">Login</button>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>