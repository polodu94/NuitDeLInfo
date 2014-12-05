<?php $this->assign('title', "{$user['User']['name']} weezs"); ?>
<?php if(!empty($posts)): ?>
	<div class="hero-unit">
		<h1>Weezs</h1>
	</div>
	<div class="row">
	<?php foreach($posts as $post): ?>
		<div class="span">
		    <h2><?php echo $post['User']['name']; ?> weez this :</h2>
		    <p>Description : <?php echo $post['Post']['content']; ?></p>
		    <div class="row">
		    	<div class="span1">
		    		<?php 
		    		echo $this->Html->link(
			    			'Remove', 
			    			array(
				    			'controller' => 'posts', 
				    			'action' => 'remove', 
				    			'id' => $post['Post']['id']
				    		),
			    			array('class' => 'btn')
		    			); 
		    		?>
		    	</div>
		    </div>
	    </div>
	<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="hero-unit">
		<h1>No Weez</h1>
		<p><?php echo $user['User']['name']; ?> has no weez</p>
	</div>
<?php endif; ?>