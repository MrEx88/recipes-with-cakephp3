<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $this->fetch('title') ?>
	</title>

	<?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <?= $this->Html->script("http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js") ?>
	<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?>
	<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js') ?>
</head>
<body>
	 <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->element('header') ?>
        <?= $this->fetch('content') ?>
	
		<h1><span data-bind="text:Recipe.RecipeName"></span></h1>
		<img width="200px" height="200px" data-bind="attr:{src:Recipe.Image}, visible:Recipe.HasImage" />
		<h4 data-bind="visible: Recipe.HasIngredients">Ingredients</h4>
		<pre><span data-bind="text:Recipe.Ingredients"></span></pre>
		<h4 data-bind="visible: Recipe.HasInstructions">Instructions</h4>
		<p><span data-bind="text:Recipe.Instructions"></span></p>
	</div>
</body>

<script>			
	function Recipe() {
		var self = this;
		self.RecipeName = ko.observable("");
		self.Ingredients = ko.observable("");
		self.Instructions = ko.observable("");
		self.Image = ko.observable("");

		self.HasIngredients = ko.computed(function() {
			return self.Ingredients() !== "";
		});

		self.HasInstructions = ko.computed(function() {
			return self.Instructions() !== "";
		});

		self.HasImage = ko.computed(function() {
			// TODO: Check for a valid url
			return self.Image() !== "";
		});
		/*self.arr = ko.computed(function () {;
				for (var i = 0; i < self.Area().length; i++)
				{
					var str ="";
					if (self.Area()[i] === '\n')
					{
						arr.push(str);
						str = "";
					}
					else
					{
						str = str + self.Area()[i];
					}
				}
		});*/
	}
	
	function RecipeViewModel() {
		var self = this;
		self.Recipe = new Recipe();
	}
	
	ko.applyBindings(new RecipeViewModel());
</script>

</html>