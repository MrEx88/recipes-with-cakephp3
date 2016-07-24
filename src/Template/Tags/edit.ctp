<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tags) ?>
    <fieldset>
        <legend><?= __('Edit Tags') ?></legend>
        <?php foreach($tags as $tag):
            echo $this->Form->input($tag->id, ['value' => $tag->name, 'label' => false]);
        endforeach;?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
