<div class="recipes view large-9 medium-8 columns content">
    <h3><?= h($recipe->name) ?></h3>
    <div class="row">
        <!-- col-xs-* needs to be used in wkhtmltopdf -->
        <div class="col-xs-6">
            <h4><?= __('Ingredients') ?></h4>
            <?= $this->Text->autoParagraph(h($recipe->ingredients)); ?>
        </div>
        <div class="col-xs-6">
        <?php if($recipe->image !== ""): ?>
            <img src="<?= WWW_ROOT ?>img/<?= $recipe->image ?>" />
        <?php endif; ?>
        </div>
    </div>
        <h4><?= __('Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
</div>
