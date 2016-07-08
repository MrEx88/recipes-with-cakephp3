<div class="recipes index large-12 medium-12 columns content">
    <h3><?= __('Recipes') ?></h3>
    
    <!--<div class="row"> --->
        <?php foreach ($recipes as $recipe): ?>
        <div class="col-lg-4 jumbotron">
            <div class="row">
                <div class="col-md-9"><?= h($recipe->name) ?> </div>
                <div class="col-md-3"> 
                    <a href="edit/<?= $recipe->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="delete/<?= $recipe->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a> 
                </div>
            </div>
            <div class="row">
            <?php if($recipe->image !== ""): ?>
                <div class="col-md-12">
                    <?= $this->Html->image($recipe->image, ['alt' => $recipe->name, 'url' => ['controller' => 'Recipes', 'action' => 'view', $recipe->id], 'height' => '250', 'width' => '250']) ?>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <?= $this->Html->link($recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipe->id]) ?>
                </div>
            <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">Tags:  <?= $this->Query->getTags($recipe->id) ?> </div>  
            </div>
        </div>
        <?php endforeach; ?>
   <!-- </div> --> <!-- end row -->

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
