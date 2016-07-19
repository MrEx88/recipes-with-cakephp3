<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipe Tags'), ['controller' => 'RecipesTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe Tag'), ['controller' => 'RecipesTags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($tag->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Recipe Tags') ?></h4>
        <?php if (!empty($tag->recipes_tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Recipe Id') ?></th>
                <th><?= __('Tag Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->recipes_tags as $recipeTags): ?>
            <tr>
                <td><?= h($recipesTags->recipe_id) ?></td>
                <td><?= h($recipesTags->tag_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecipesTags', 'action' => 'view', $recipesTags->recipe_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecipesTags', 'action' => 'edit', $recipesTags->recipe_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecipesTags', 'action' => 'delete', $recipesTags->recipe_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipesTags->recipe_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
