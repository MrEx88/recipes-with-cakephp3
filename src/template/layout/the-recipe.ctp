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
    <?= $this->Html->css('site.css') ?>
    <?= $this->Html->css('recipes.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <?= $this->Html->script("http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js") ?>
	<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?>
	<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') ?>
</head>
<body>
    <?= $this->element('header') ?>
    <div class="container">
        <!-- <pre data-bind="text: ko.toJSON($data, null, 2)"></pre> -->
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
<!-- recipes/view/*
        <div class="recipes view columns content">
            <h3><?= h($recipe->name) ?></h3>
            <div class="row">
                <div class="col-md-6">
                <h4><?= __('Ingredients') ?></h4>
                <?= $this->Text->autoParagraph($recipe->ingredients_list) ?>
                </div>
                <div class="col-md-6">
                <?php if($recipe->image !== ""): ?>
                    <?= $this->Html->image($recipe->image) ?>
                <?php endif; ?>
                </div>
            </div>
            <h4><?= __('Instructions') ?></h4>
            <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
            <br />
            <?php if (count($recipe->tags) > 0): ?>
            <pre><h5>Tags: <?php foreach($recipe->tags as $tag) {
                    echo $this->Html->link($tag->name, ['action' => 'search', $tag->name]);
                    echo '&nbsp;';
            }?></h5></pre>
            <?php endif; ?>
        </div>
-->
<!-- TODO: switch to this after getting knockout js to work here
        <div class="recipes view columns content">
		<h3><span data-bind="text:Recipe.recipeName, valueUdate:['onload', 'afterkeydown']"></span></h3>
        <div class="row">
            <div class="col-md-6">
                <h4 data-bind="visible:Recipe.HasIngredients">Ingredients</h4>
                <pre data-bind="visible:Recipe.HasIngredients"><span data-bind="text:Recipe.ingredients, valueUdate:['onload', 'afterkeydown']"></span></pre>
            </div>
            <div class="col-md-6">
                <img width="200px" height="200px" data-bind="attr:{src:Recipe.image}, visible:Recipe.HasImage" />
            </div>
        </div>
        <h4 data-bind="visible:Recipe.HasInstructions">Instructions</h4>
        <pre><span data-bind="text:Recipe.instructions, valueUdate:['onload', 'afterkeydown']"></span></pre>
        </div>
-->
<!--        <h5 data-bind="visible:Recipe.HasTags">Tags<span data-bind="text:Recipe.tags"></span></h5>-->
        <h3><span data-bind="text:Recipe.recipeName, valueUdate:['onload', 'afterkeydown']"></span></h3>
		<img width="200px" height="200px" data-bind="attr:{src:Recipe.image}, visible:Recipe.HasImage" />
		<h4 data-bind="visible:Recipe.HasIngredients">Ingredients</h4>
		<pre data-bind="visible:Recipe.HasIngredients"><span data-bind="text:Recipe.ingredients, valueUdate:['onload', 'afterkeydown']"></span></pre>
		<h4 data-bind="visible:Recipe.HasInstructions">Instructions</h4>
		<p><span data-bind="text:Recipe.instructions, valueUdate:['onload', 'afterkeydown']"></span></p>
	</div>
</body>
<footer>
    <p>&copy;&nbsp;<?=date('Y') . ' My Recipes '. __('site, Powered by ') . $this->Html->link('CakePHP', 'http://http://book.cakephp.org/3.0/en/index.html', ['class' => 'cakephp-link', 'target' => '_blank']) . ' ' .  $this->Misc->cakeVersion() ?></p>
</footer>

<script>
    /* This does not work in recipes/edit/* for some reason */
	function Recipe() {
		var self = this;
		self.recipeName = ko.observable(<?= $recipe->name !== null ? (string)$recipe->name : "\"\"" ?>);
		self.ingredients = ko.observable(<?= $recipe->ingredients !== null ? (string)$recipe->ingredients : "\"\"" ?>);
		self.instructions = ko.observable(<?= $recipe->instructions !== null ? (string)$recipe->instructions : "\"\"" ?>);
		self.image = ko.observable(<?= $recipe->image !== null ? (string)$recipe->image : "\"\"" ?>);
//        self.tags = ko.observableArray(<$recipe->tags !== null ? $recipe->tags : [] ?>);
        
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
        
//        self.HasTags = ko.computed(function() {
//           return self.tags().length > 0; 
//        });
	}
	
	function RecipeViewModel() {
		var self = this;
		self.Recipe = new Recipe();
	}
	
	ko.applyBindings(new RecipeViewModel());
</script>

</html>