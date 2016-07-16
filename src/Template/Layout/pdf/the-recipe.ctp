<?php
$this->layout = false;
?>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$appName = 'My Recipes';
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $appName ?>:
        <?= $this->fetch('title') ?>
	</title>

	<?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body>
	 <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
	       
		<h1>$recipe->name</h1>
		<img width="200px" height="200px" data-bind="attr:{src:Recipe.Image}, visible:Recipe.HasImage" />
		<h4 data-bind="visible:Recipe.HasIngredients">Ingredients</h4>
		<pre><span data-bind="text:Recipe.Ingredients"></span></pre>
		<h4 data-bind="visible:Recipe.HasInstructions">Instructions</h4>
		<p><span data-bind="text:Recipe.Instructions"></span></p>
	</div>
</body>
</html>