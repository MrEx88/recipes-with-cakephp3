<div class="recipes view columns content">
    <h3 class="recipe-title"><?= h($recipe->name) ?></h3>
    <br />
    <div class="row">
        <div class="col-xs-6">
        <h4><?= __('Ingredients') ?></h4>
        <?= $this->Text->autoParagraph($recipe->ingredients_list) ?>
        </div>
        <div class="col-xs-6">
        <?php if($recipe->image !== ""): ?>
            <?= $this->Html->image($recipe->image) ?>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h4><?= __('Instructions') ?></h4>
            <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
        </div>
    </div>
    <br />
    <?php if (count($recipe->tags) > 0): ?>
    <pre><h5>Tags: <?php foreach ($recipe->tags as $tag) {
            echo $this->Html->link($tag->name, ['action' => 'search', $tag->name], ['class' => 'recipe-tag']);
            echo '&nbsp;';
    }?></h5></pre>
    <?php endif; ?>
</div>