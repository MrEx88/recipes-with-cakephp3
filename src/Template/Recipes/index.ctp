<div class="recipes index content">
    <?php if (count($recipes) == 0): ?>
        <h3><?= _('No ') . $h3Title . __(' found') ?></h3>
    <?php else: ?>
        <div class="row">
            <div class="col-md-8">
                <h3><?= __($h3Title) ?></h3>
            </div>
            <div class="col-md-4">
                <ul class="pagination">
                    <li><h5><?= __('sort by:') ?></h5></li>
                    <li><?= $this->Paginator->sort('name') ?></li>
                    <li><?= $this->Paginator->sort('created') ?></li>
                    <li><?= $this->Paginator->sort('modified') ?></li>
                </ul>
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
                        <?= $this->Html->link($recipe->name, ['controller' => 'Recipes', 'action' => 'view', $recipe->id], ['class' => 'recipe-name-button']) ?>
                <?php endif; ?>
            </div>
            <div class="recipe-tags">
            <?php if(count($recipe->tags) <= 3): ?>
                Tags:
                <?php $i = 1; foreach ($recipe->tags as $tag) {
                        echo $this->Html->link($tag->name, ['controller' => 'Recipes', 'action' => 'search', $tag->name], ['class' => 'recipe-tag']);
                        if($i != count($recipe->tags))
                        {
                            echo ", ";
                            $i++;
                        }
                    }?>
            <?php else: ?>
                <?= $this->Form->input('Recipe.tags', ['type' => 'select', 'options' => $this->Misc->getNames($recipe->tags), 'label' => 'Tags:', 'class' => 'tags-dropdown']) ?>
            <?php endif; ?>
            </div>
        </div> <!-- end recipe-col -->
        <?php endforeach; ?>

        <div class="paginator col-xs-12">
            <ul class="pagination">
                <?= $this->Paginator->first(__('First')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('Last')) ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}. Showing {{current}} records out of {{count}}.')]) ?></p>
        </div>
    <?php endif; ?>
</div>
