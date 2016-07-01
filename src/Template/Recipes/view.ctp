<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipe Tags'), ['controller' => 'RecipeTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe Tag'), ['controller' => 'RecipeTags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recipes view large-9 medium-8 columns content">
    <h3><?= h($recipe->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($recipe->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recipe->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($recipe->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($recipe->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ingredients') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->ingredients)); ?>
    </div>
    <div class="row">
        <h4><?= __('Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
    </div>
    <div class="row">
        <h4><?= __('Image') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->image)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recipe Tags') ?></h4>
        <?php if (!empty($recipe->recipe_tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Recipe Id') ?></th>
                <th><?= __('Tag Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipe->recipe_tags as $recipeTags): ?>
            <tr>
                <td><?= h($recipeTags->recipe_id) ?></td>
                <td><?= h($recipeTags->tag_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecipeTags', 'action' => 'view', $recipeTags->recipe_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecipeTags', 'action' => 'edit', $recipeTags->recipe_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecipeTags', 'action' => 'delete', $recipeTags->recipe_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipeTags->recipe_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
