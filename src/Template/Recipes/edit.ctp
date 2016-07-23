<div class="recipes form large-12 medium-12 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Edit Recipe') ?></legend>
                <?= $this->Form->input('name', ['data-bind' =>'value:Recipe.recipeName']) ?>
                <?= $this->Form->input('ingredients', ['data-bind' =>'value:Recipe.ingredients', 'row' => '100', 'cols' => '25']) ?>
                <?= $this->Form->input('instructions', ['data-bind' =>'value:Recipe.instructions, valueUdate:[\'onload\', \'afterkeydown\']', 'row' => '10', 'cols' => '45']) ?>
                <?= $this->Form->input('image', ['data-bind' =>'value:Recipe.image']) ?>
                <?= $this->Form->input('tags._ids', ['options' => $tags, 'multiple' => 'checkbox']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<br />
<br />
<h2 data-bind="visible:Recipe.HasPreview"><i>Preview</i></h2>
<hr />
