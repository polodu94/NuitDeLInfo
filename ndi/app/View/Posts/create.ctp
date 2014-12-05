<?php $this->assign('title', 'Create post'); ?>
<?php $this->Html->css('signin', array('inline' => false)); ?>
<div class="container">
	<?php echo $this->Form->create('Post', array('type' => 'post', 'class' => 'form-signin')); ?>
	<h2 class="form-signin-heading">Create</h2>
	<?php echo $this->Form->input('content', array(
	'label' => 'Content', 
	'class' => 'input-block-lelvel',
	'type'  => 'textarea',
	'rows'   => 2,
	'cols'   => 50)); ?>
	
    <button class="btn btn-large btn-primary" type="submit">Create</button>
	<?php echo $this->Form->end(); ?>
</div>