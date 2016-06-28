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
    <?= $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') ?>
    <!-- TODO: Make own css -->
    <?= $this->Html->css('salient.css') ?>
	
	<?= $this->Html->script("http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js") ?>
	<!-- <?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?> -->
	<?= $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') ?>
</head>
<body>
	 <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    
		<br />
		<br />
		<h2><i>Preview</i></h2>
		<hr />
	
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