<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recipe Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recipeTags index large-9 medium-8 columns content">
    <h3><?= __('Recipe Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('recipe_id') ?></th>
                <th><?= $this->Paginator->sort('tag_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipeTags as $recipeTag): ?>
            <tr>
                <td><?= $recipeTag->has('recipe') ? $this->Html->link($recipeTag->recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipeTag->recipe->id]) : '' ?></td>
                <td><?= $recipeTag->has('tag') ? $this->Html->link($recipeTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $recipeTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recipeTag->recipe_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recipeTag->recipe_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipeTag->recipe_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeTag->recipe_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
