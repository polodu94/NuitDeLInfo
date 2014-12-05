<?php $this->assign('title', 'Users list'); ?>
<?php 
		$this->Paginator->options(array(
    'update' => '#content', // Ca c'est l'id de la div ou sera afficher le contenu de tes pages tu le trouve dans la vue default.ctp sous le repertoire app/view/layout
    'evalScripts' => true, // ca c'est pour dire que si dans le code de retour ou la page de retour chargé par ajax il y a un script, est ce qu'il doit l'evaluer/executer ou non
    'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)), // ca c'est dans la doc et en gros ca veut dire avant d'aller chercher les pages demande affiche (avec l'effet fade/fondu) la div dont l'id est #busy-indicator et qui contient en principe le message de "chargement des données) Pour info au niveau de css tu dois avoir ceci #busy-indicator{display:none;} pour que cet element soit caché
    'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)), // la c'est pour faire disparaitre l'element busy-indicator quand les données on été chargé
)); ?>
<?php if(!empty($users)): ?>
	<div class="hero-unit">
		<h1>Refugees</h1>
	</div>
	<div class="row">
	<?php foreach($users as $user): ?>
		<div class="span2">
		    <h2><?php echo $user['User']['name']; ?></h2>
		    <p>Description : <?php echo $user['User']['description']; ?></p>
		    <?php if ($user['Center']['name']): ?>
		    	<p>Currently at : <?php echo $user['Center']['name']; ?></p>
		    	<p><?php echo $this->Html->link('See center details',
		    	array('controller' => 'centers', 'action' => 'view', 'id' => $user['Center']['id'], 'type' => $user['Center']['type'])); ?></p>
		    <?php else: ?>
		    	<p>Not in a center</p>
		    <?php endif; ?>
		    <div class="row">
		    	<div class="span2">
		    		<?php 
		    			echo $this->Html->link(
			    			'View', 
			    			array(
				    			'controller' => 'users', 
				    			'action' => 'view', 
				    			'id' => $user['User']['id']
				    		),
			    			array('class' => 'btn')
		    			); 
		    		?>
		    	</div>
		    </div>
	    </div>
	<?php endforeach; ?>
	</div>
<div class="pagination pagination-large pagination-centered">
    <ul>
        <?php
        	echo $this->Paginator->first('< first', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            echo $this->Paginator->prev('prev', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>', 'modulus' => 6));
            echo $this->Paginator->next('next', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        	echo $this->Paginator->last('last >', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
        </ul>
    </div>
	<?php echo $this->Js->writeBuffer();?>
<?php else: ?>
	<div class="hero-unit">
		<h1>No user</h1>
	</div>
<?php endif; ?>