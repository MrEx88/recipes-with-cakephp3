<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recipe Tag'), ['action' => 'edit', $recipeTag->recipe_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recipe Tag'), ['action' => 'delete', $recipeTag->recipe_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeTag->recipe_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recipe Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recipeTags view large-9 medium-8 columns content">
    <h3><?= h($recipeTag->recipe_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Recipe') ?></th>
            <td><?= $recipeTag->has('recipe') ? $this->Html->link($recipeTag->recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipeTag->recipe->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tag') ?></th>
            <td><?= $recipeTag->has('tag') ? $this->Html->link($recipeTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $recipeTag->tag->id]) : '' ?></td>
        </tr>
    </table>
</div>
