<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipe Tags'), ['controller' => 'RecipeTags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe Tag'), ['controller' => 'RecipeTags', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
 

<div class="recipes index large-12 medium-12 columns content">
    <h3><?= __('Recipes') ?></h3>
    <table border="1">
       <?php foreach ($recipes as $recipe): ?>
            <tr class="col-md-3">
                <td>
                <table border="1">
                    <tr>
                        <td><?= h($recipe->name) ?> 
                            <a href="edit/<?= $recipe->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="delete/<?= $recipe->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php if($recipe->image !== ""): ?>
                        <tr><td><?= $this->Html->image($recipe->image, ['alt' => $recipe->name, 'url' => ['controller' => 'Recipes', 'action' => 'view', $recipe->id], 'height' => '250', 'width' => '250']) ?></td></tr>
                    <?php else: ?>
                        <tr><td><?= $this->Html->link($recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipe->id]) ?></td></tr>
                    <?php endif; ?>
                    <tr><td>Tags: <?= $this->Query->getTags($recipe->id) ?></td></tr>
                </table>
                </td>
            </tr>
       <?php endforeach; ?>
    </table>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipes as $recipe): ?>
            <tr>
                <td><?= $this->Number->format($recipe->id) ?></td>
                <td><?= h($recipe->name) ?></td>
                <td><?= h($recipe->created) ?></td>
                <td><?= h($recipe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recipe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recipe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?>
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
