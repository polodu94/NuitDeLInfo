<?php $this->assign('title', 'Posts'); ?>
<?php if(!empty($posts)): ?>
	<div class="hero-unit">
		<h1>Weezs</h1>
	</div>
	<div class="row">
	<?php foreach($posts as $post): ?>
		<?php $post = current($post); ?>
		<div class="span">
		    <h2><?php echo $post['name']; ?> weez this :</h2>
		    <p>Description : <?php echo $post['content']; ?></p>
		    <div class="row">
		    	<?php if($post['id'] == $id): ?>
		    	<div class="span1">
		    		<?php 
		    		echo $this->Html->link(
			    			'Edit', 
			    			array(
				    			'controller' => 'posts', 
				    			'action' => 'edit', 
				    			'id' => $post['id']
				    		),
			    			array('class' => 'btn')
		    			); 
		    		?>
		    	</div>
		    	<?php endif; ?>
		    	<div class="span1">
		    		<?php 
		    		echo $this->Html->link(
			    			'Remove', 
			    			array(
				    			'controller' => 'posts', 
				    			'action' => 'remove', 
				    			'id' => $post['id']
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
		<h1>No posts</h1>
		<p>You have actually no posts, you can add posts here : 
			<?php echo $this->Html->link('weez', array('controller' => 'posts', 'action' => 'add'), array('class' => 'btn')); ?>
	</div>
<?php endif; ?>