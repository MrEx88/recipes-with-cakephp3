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
$this->layout = false;
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
    
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <?= $this->Html->script("http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js") ?>
	<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?>
	<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') ?>
</head>
<body>
	 <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->element('header') ?>
        <?= $this->fetch('content') ?>
		<h1><span data-bind="text:Recipe.recipeName, valueUdate:['onload', 'afterkeydown']"></span></h1>
		<img width="200px" height="200px" data-bind="attr:{src:Recipe.image}, visible:Recipe.HasImage" />
		<h4 data-bind="visible:Recipe.HasIngredients">Ingredients</h4>
		<pre data-bind="visible:Recipe.HasIngredients"><span data-bind="text:Recipe.ingredients, valueUdate:['onload', 'afterkeydown']"></span></pre>
		<h4 data-bind="visible:Recipe.HasInstructions">Instructions</h4>
		<p><span data-bind="text:Recipe.instructions, valueUdate:['onload', 'afterkeydown']"></span></p>
	</div>
</body>

<script>			
	function Recipe() {
		var self = this;
		self.recipeName = ko.observable(<?= $recipe->name !== null ? "\"" . $recipe->name . "\"" : "\"\"" ?>);
		self.ingredients = ko.observable(<?= $recipe->ingredients !== null ? "\"" . $recipe->ingredients . "\"" : "\"\"" ?>);
		self.instructions = ko.observable(<?= $recipe->instructions !== null ? "\"" . $recipe->instructions . "\"" : "\"\"" ?>);
		self.image = ko.observable(<?= $recipe->image !== null ? "\"" . $recipe->image . "\"" : "\"\"" ?>);

		self.HasIngredients = ko.computed(function() {
			return self.ingredients() !== "";
		});

		self.HasInstructions = ko.computed(function() {
			return self.instructions() !== "";
		});

		self.HasImage = ko.computed(function() {
			// TODO: Check for a valid url
			return self.image() !== "";
		});
        
        self.HasPreview = ko.computed(function() {
            return self.recipeName() !== "" || self.HasIngredients || self.HasInstructions || self.HasImage;
        });
	}
	
	function RecipeViewModel() {
		var self = this;
		self.Recipe = new Recipe();
	}
	
	ko.applyBindings(new RecipeViewModel());
</script>

</html>