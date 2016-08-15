<div class="recipes index content">
    <?php if (count($recipes) == 0): ?>
        <h3><?= 'No ' . $this->Misc->toList($tags) . __(' recipes found') ?></h3>
    <?php else: ?>
        <div class="row">
            <div class="col-md-9">
                <h3><?= $this->Misc->toList($tags) . __(' Recipes') ?></h3>
            </div>
            <div class="col-md-3">
                <h5>Sort:</h5>
                <button><?= $this->Paginator->sort('created', 'Date') ?></button>
                <button><?= $this->Paginator->sort('name') ?></button>
            </div>
        </div>
        <br />
        <?php foreach ($recipes as $recipe): ?>
        <div class="recipe-col col-lg-2 col-md-3 col-sm-4 col-xs-6">
            <div class="recipe-actions">
                <?= $this->Html->iconLink('', ['controller' => 'Recipes', 'action' => 'view', $recipe->id . '.pdf'], 'file-pdf-o', ['title' => 'view pdf', 'data-toggle' => 'tooltip', 'class' => 'show-tooltip', 'isFa' => true]) ?>
                <?= $this->Html->iconLink('', ['controller' => 'Recipes', 'action' => 'edit', $recipe->id], 'pencil-square-o', ['title' => 'edit recipe', 'data-toggle' => 'tooltip', 'class' => 'show-tooltip', 'isFa' => true]) ?>
                <?= $this->Form->iconPostLink(__(''), ['controller' => 'Recipes', 'action' => 'delete', $recipe->id], 'remove', ['confirm' => __('Are you sure yo want to delete # {0}', $recipe->id), 'title' => 'delete recipe', 'data-toggle' => 'tooltip', 'class' => 'show-tooltip']); ?>
            </div>
            <div class="recipe-name">
                <div class="name"><?= h($recipe->name) ?></div>
            </div>
            <div class="recipe-image">
                <?php if ($recipe->image !== ""): ?>
                            <?= $this->Html->image($recipe->image, ['alt' => $recipe->name, 'url' => ['controller' => 'Recipes', 'action' => 'view', $recipe->id], 'class' => 'recipe-image']) ?>
                <?php else: ?>
                        <?= $this->Html->link($recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipe->id]) ?>
                <?php endif; ?>
            </div>
            <div class="recipe-tags">
            <?php if(count($recipe->tags) <= 3): ?>
                Tags:
                <?php $i = 1; foreach ($recipe->tags as $tag) {
                        echo $this->Html->link($tag->name, ['controller' => 'Recipes', 'action' => 'search', $tag->name]);
                        if($i != count($recipe->tags))
                        {
                            echo ", ";
                            $i++;
                        }
                    }?>
            <?php else: ?>
                <?= $this->Form->input('Recipe.tags', ['type' => 'select', 'options' => $this->Misc->getNames($recipe->tags), 'label' => 'Tags:', 'style' => 'height: 22px; padding: 0px']) ?>
            <?php endif; ?>
            </div>
        </div> <!-- end recipe-col -->
        <?php endforeach; ?>

        <div class="paginator col-xs-12">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    <?php endif; ?>
</div>