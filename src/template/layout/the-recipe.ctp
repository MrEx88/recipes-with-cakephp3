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
        <div class="recipes view columns content">
            <h3 class="recipe-title" data-bind="visible:Recipe.HasName"><span data-bind="text:Recipe.name"></span></h3>
            <br />
            <div class="row">
                <div class="col-xs-6">
                <h4 data-bind="visible:Recipe.HasIngredients"><?= __('Ingredients') ?></h4>
                <!-- $this->Text->autoParagraph() doesn't support html attributes,
                        so no data-bind. Maybe implement my own version:
        
http://api.cakephp.org/3.2/source-class-Cake.View.Helper.TextHelper.html#259-282
                -->
                <pre data-bind="visible:Recipe.HasIngredients, text:Recipe.ingredients"><?= h($recipe->ingredients) ?></pre>
                </div>
                <div class="col-xs-6">
                    <img width="200px" height="200px" data-bind="attr:{src:Recipe.image}, visible:Recipe.HasImage" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4 data-bind="visible:Recipe.HasInstructions"><?= __('Instructions') ?></h4>
                    <pre data-bind="visible:Recipe.HasInstructions, text:Recipe.instructions"><?= h($recipe->instructions) ?></pre>
                </div>
            </div>
            <br />
            <?php if (count($recipe->tags) > 0): ?>
            <pre><h5>Tags: <?php foreach ($recipe->tags as $tag) {
                    echo $this->Html->link($tag->name, ['action' => 'search', $tag->name], ['class' => 'recipe-tag']);
                    echo '&nbsp;';
            }?></h5></pre>
            <?php endif; ?>
        </div>
	</div>
</body>
<footer>
    <p>&copy;&nbsp;<?=date('Y') . ' My Recipes '. __('site. Powered by ') . $this->Html->link('CakePHP', 'http://http://book.cakephp.org/3.0/en/index.html', ['class' => 'cakephp-link', 'target' => '_blank']) . ' ' .  $this->Misc->cakeVersion() ?></p>
</footer>
    
<script>
	function Recipe() {
		var self = this;
		self.name = ko.observable("<?= $recipe->name ?>");
		self.ingredients = ko.observable("<?= $recipe->ingredients ?>");
		self.instructions = ko.observable("<?= $recipe->instructions ?>");
		self.image = ko.observable("<?= $recipe->image ?>");
        self.tags = ko.observableArray([<?php $i = 1; 
                                        if(isset($recipe['tags'])) 
                                        {
                                            foreach ($recipe['tags'] as $tag)
                                            {
                                                if($i != count($recipe->tags))
                                                {
                                                    echo "\"" . $tag->name . "\"" . ", ";
                                                    $i++;
                                                }
                                                else
                                                {
                                                    echo "\"" . $tag->name . "\"";
                                                }
                                            }
                                        } ?>]);
        
        self.HasName = ko.computed(function() {
			return self.name() !== "";
		});
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
            return self.name() !== "" || self.HasIngredients || self.HasInstructions || self.HasImage;
        });
        
        self.HasTags = ko.computed(function() {
           return self.tags().length > 0; 
        });
	}
	
	function RecipeViewModel() {
		var self = this;
		self.Recipe = new Recipe();
	}
	
	ko.applyBindings(new RecipeViewModel());
</script>

</html>