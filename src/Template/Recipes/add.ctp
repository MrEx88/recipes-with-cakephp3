<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recipe Tags'), ['controller' => 'RecipeTags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe Tag'), ['controller' => 'RecipeTags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Add Recipe') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('ingredients');
            echo $this->Form->input('directions');
            echo $this->Form->input('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Add Recipe') ?></legend>
               <!-- <label class="form-label">Recipe Name:</label>
                <input type="text" id="txtRecipeName" name="txtRecipeName" data-bind="value:Recipe.RecipeName" /> -->
                <?= $this->Form->input('recipe', ['data-bind' =>'value:Recipe.RecipeName']) ?>
               <!-- <label class="form-label" display="block" float="left">Ingredients: </label>    
                <textarea rows="15" cols="30" placeholder="" data-bind="value:Recipe.Ingredients"></textarea>-->
                <?= $this->Form->input('ingredients', ['data-bind' =>'value:Recipe.Ingredients', 'row' => '100', 'cols' => '25']) ?>
               <!-- <label class="form-label">Directions: </label>  
                <textarea rows="7" cols="70" placeholder="" data-bind="value:Recipe.Directions"></textarea>-->
                <?= $this->Form->input('directions', ['data-bind' =>'value:Recipe.Directions', 'row' => '10', 'cols' => '45']) ?>
                <?= $this->Form->input('image', ['data-bind' =>'value:Recipe.Image', 'row' => '5', 'cols' => '25']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>