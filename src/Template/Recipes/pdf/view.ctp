<div class="recipes view large-9 medium-8 columns content">
    <h3><?= h($recipe->name) ?></h3>
    <div class="row">
        <div class="col-md-6">
        <h4><?= __('Ingredients') ?></h4>
            <?= $this->Text->autoParagraph(h($recipe->ingredients)); ?>
        </div>
        <div class="col-md-6">
        <?php if($recipe->image !== ""): ?>
            <img src="<?= WWW_ROOT ?>img/<?= $recipe->image ?>" />
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <h4><?= __('Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
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
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
