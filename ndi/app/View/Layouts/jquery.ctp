<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		$this->Html->css('bootstrap.min', array('inline' => false));
		$this->Html->css('default', array('inline' => false));

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
	<?php echo $this->Html->script('jquery'); ?>
</head>
<body>
	<div class="container">
		<?php echo $this->element('menu'); ?>
		<?php echo $this->Session->flash(); ?>
		<div id="content">

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php $this->Html->script('jquery-ui-1.10.3.custom.min', array('inline' => false)); ?>
	<?php $this->Html->script('bootstrap.min', array('inline' => false)); ?>
	<?php echo $this->fetch('script'); ?> 
</body>
</html>