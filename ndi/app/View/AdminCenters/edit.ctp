<?php $this->assign('title', 'Edit center'); ?>
<?php $this->Html->css('signin', array('inline' => false)); ?>
<div class="container">
	<?php echo $this->Form->create('Admincenter', array('type' => 'post', 'class' => 'form-signin')); ?>
	<h2 class="form-signin-heading">Edit center</h2>
	<?php echo $this->Form->input('Center.name', array('label' => 'Name', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('Center.city', array('label' => 'city', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('Center.country', array('label' => 'Country', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('Center.address', array('label' => 'Address', 'class' => 'input-block-lelvel')); ?>
    <button class="btn btn-large btn-primary" type="submit">Edit this center</button>
	<?php echo $this->Form->end(); ?>
</div>