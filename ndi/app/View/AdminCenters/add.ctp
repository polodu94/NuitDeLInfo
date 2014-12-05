<?php $this->assign('title', 'Add center'); ?>
<?php $this->Html->css('signin', array('inline' => false)); ?>
<div class="container">
		<?php $this->assign('title', 'Sign in'); ?>
	<?php $this->Html->css('signin', array('inline' => false)); ?>
	<div class="container">
		<div class="form-box" id="login-box">
			<div class="header">Add center</div>
	<?php echo $this->Form->create('Admincenter', array('type' => 'post', 'class' => 'form-signin')); ?>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->input('Center.name', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Name')); ?>
				</div>
			</div>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->input('Center.city', array('label' => false, 'class' => 'form-control', 'placeholder' => 'City')); ?>
				</div>
			</div>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->input('Center.country', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Country')); ?>
				</div>
			</div>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->input('Center.address', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Address')); ?>
				</div>
			</div>
			<div class="body bg-gray">
				<div class="form-group">
					<?php echo $this->Form->select('type', array(0 => 'Center of refugee', 1 => 'Donation of center'), array('label' => 'Type', 'class' => 'form-control', 'default' => 0)); ?>
				</div>
			</div>
			<div class="footer">  
				<button class="btn bg-olive btn-block" type="submit">Add</button>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>