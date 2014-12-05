<?php $this->assign('title','Home'); ?>
<?php if(isset($user)): ?>
	<div class="hero-unit">
		<h1>Welcome <?php echo $user['name']; ?></h1>
	</div>
<?php else: ?>
	<div class="hero-unit">
		<h1>Welcome to <?php echo Configure::read('name'); ?></h1>
	</div>
<?php endif; ?>