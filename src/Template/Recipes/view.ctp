<div class="recipes view columns content">
    <h3><?= h($recipe->name) ?></h3>
    <div class="row">
        <div class="col-md-6">
        <h4><?= __('Ingredients') ?></h4>
        <?= $this->Text->autoParagraph($recipe->ingredients_list) ?>
        </div>
        <div class="col-md-6">
        <?php if($recipe->image !== ""): ?>
            <?= $this->Html->image($recipe->image) ?>
        <?php endif; ?>
        </div>
    </div>
    <h4><?= __('Instructions') ?></h4>
    <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
    <br />
    <?php if (count($recipe->tags) > 0): ?>
    <pre><h5>Tags: <?php foreach($recipe->tags as $tag) {
            echo $this->Html->link($tag->name, ['action' => 'search', $tag->name]);
            echo '&nbsp;';
    }?></h5></pre>
    <?php endif; ?>
</div>