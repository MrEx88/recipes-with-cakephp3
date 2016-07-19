<div class="recipes index content">
    <h3><?= __('Recipes') ?></h3>
    <?php foreach ($recipes as $recipe): ?>
    <div class="recipe-col col-md-3 col-sm-4 col-xs-6">
        <div class="recipe-actions">
                <a href="recipes/view/<?= $recipe->id ?>.pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                <a href="recipes/edit/<?= $recipe->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <!-- Need to make a POST request here -->
                <!-- <?= $this->Form->postIconLink(__(''), ['controller' => 'Recipes', 'action' => 'delete'], 'remove', ['confirm' => __('Are you sure yo want to delete # {0}', $recipe->id)]);
                <a href="recipes/delete/<?= $recipe->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <div class="recipe-name">
            <div class="name"><?= h($recipe->name) ?></div>
        </div>
        <div class="recipe-image">
            <?php if($recipe->image !== ""): ?>
                        <?= $this->Html->image($recipe->image, ['alt' => $recipe->name, 'url' => ['controller' => 'Recipes', 'action' => 'view', $recipe->id], 'class' => 'recipe-image']) ?>
            <?php else: ?>
                    <?= $this->Html->link($recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipe->id]) ?>
            <?php endif; ?>
        </div>
        <div class="recipe-tags">Tags:  
                <?php foreach($this->Query->getTags($recipe->id) as $tag) {
                        echo $this->Html->link($tag, ['action' => 'tags', $tag]);
                        echo '&nbsp;';
                }?>
        </div>
    </div>
    <?php endforeach; ?>
    
    <div class="paginator col-xs-12">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
