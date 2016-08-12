<div class="recipes form large-12 medium-12 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Add Recipe') ?></legend>
        <div class="row">
            <div class="col-md-8">
                <?= $this->Form->input('name', ['data-bind' =>'value:Recipe.recipeName']) ?>
                <?= $this->Form->input('ingredients', ['data-bind' =>'value:Recipe.ingredients', 'row' => '100', 'cols' => '25']) ?>
                <?= $this->Form->input('instructions', ['data-bind' =>'value:Recipe.instructions', 'row' => '10', 'cols' => '45']) ?>
                <?= $this->Form->input('image', ['data-bind' =>'value:Recipe.image']) ?>
            </div>
            <div class="col-md-4">
                <h6>Recipe Tags</h6>
                <p class='p-note'>(hold CTRL to select more than one tag)</p>
                <?= $this->Form->input('tags._ids', ['options' => $tags, 'label' => false/*, 'data-bind' => 'value:Recipe.tags'*/]) ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<br />
<br />
<h2 data-bind="visible:Recipe.HasPreview"><i>Preview</i></h2>
<hr />