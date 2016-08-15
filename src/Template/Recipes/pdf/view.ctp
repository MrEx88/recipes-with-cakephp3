<div class="recipes view columns content">
    <div class="recipe-title-pdf">
        <h3><?= h($recipe->name) ?></h3>
    </div>
    <br/><br/>
    <div class="row">
        <!-- col-xs-* needs to be used in wkhtmltopdf -->
        <div class="col-xs-6">
            <h4><legend><?= __('Ingredients') ?></legend></h4>
            <?= $this->Text->autoParagraph($recipe->ingredients_list) ?>
        </div>
        <div class="col-xs-6">
        <?php if ($recipe->image !== ""): ?>
            <img src="<?= WWW_ROOT ?>img/<?= $recipe->image ?>" />
        <?php endif; ?>
        </div>
    </div>
    <br/>
    <h4><legend><?= __('Instructions') ?></legend></h4>
    <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
</div>
