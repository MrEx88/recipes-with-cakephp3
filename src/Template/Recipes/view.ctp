<div class="recipes view large-9 medium-8 columns content">
    <h3><?= h($recipe->name) ?></h3>
    <div class="row">
        <div class="col-md-6">
        <h4><?= __('Ingredients') ?></h4>
            <?= $this->Text->autoParagraph(h($recipe->ingredients)); ?>
        </div>
        <div class="col-md-6">
        <?php if($recipe->image !== ""): ?>
            <?= $this->Html->image($recipe->image) ?>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <h4><?= __('Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($recipe->instructions)); ?>
    </div>
<!-- TODO: Provide Tag link navigations -->
    <!-- <div class="related">
        <h4><?= __('Related Recipe Tags') ?></h4>
        <?php if (!empty($recipe->recipes_tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Recipe Id') ?></th>
                <th><?= __('Tag Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipe->recipes_tags as $recipesTags): ?>
            <tr>
                <td><?= h($recipesTags->recipe_id) ?></td>
                <td><?= h($recipesTags->tag_id) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
</div>