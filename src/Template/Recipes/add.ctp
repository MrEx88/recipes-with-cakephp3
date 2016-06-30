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
            echo $this->Form->input('instructions');
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
                <?= $this->Form->input('name', ['data-bind' =>'value:Recipe.RecipeName']) ?>
                <?= $this->Form->input('ingredients', ['data-bind' =>'value:Recipe.Ingredients', 'row' => '100', 'cols' => '25']) ?>
                <?= $this->Form->input('instructions', ['data-bind' =>'value:Recipe.Instructions', 'row' => '10', 'cols' => '45']) ?>
                <?= $this->Form->input('image', ['data-bind' =>'value:Recipe.Image']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<br />
<br />
<h2><i>Preview</i></h2>
<hr />