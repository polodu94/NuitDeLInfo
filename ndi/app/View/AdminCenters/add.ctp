<?php $this->assign('title', 'Add center'); ?>
<?php $this->Html->css('signin', array('inline' => false)); ?>
<div class="container">
	<?php echo $this->Form->create('Admincenter', array('type' => 'post', 'class' => 'form-signin')); ?>
	<h2 class="form-signin-heading">Add center</h2>
	<?php echo $this->Form->input('name', array('label' => 'Name', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('city', array('label' => 'city', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('country', array('label' => 'Country', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->input('address', array('label' => 'Address', 'class' => 'input-block-lelvel')); ?>
	<?php echo $this->Form->label('Type', 'Type', array('class' => 'input-block-level')); ?>
	<?php echo $this->Form->select('type', array(0 => 'Center of refugee', 1 => 'Donation of center'), array('label' => 'Type', 'class' => 'input-block-lelvel', 'default' => 0)); ?>
    <button class="btn btn-large btn-primary" type="submit">Add this center</button>
	<?php echo $this->Form->end(); ?>
</div>