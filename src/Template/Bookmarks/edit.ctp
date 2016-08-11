<div class="bookmarks form large-9 medium-8 columns content">
    <?= $this->Form->create($bookmarks) ?>
    <fieldset>
        <legend><?= __('Edit Bookmarks') ?></legend>
        <?php foreach($bookmarks as $bookmark):
            echo $this->Form->input($bookmark->id, ['value' => $bookmark->name, 'label' => 'Name']);
            echo $this->Form->input($bookmark->id, ['value' => $bookmark->url, 'label' => 'URL']);
            echo '________________________________________________________________________________________';
        endforeach;?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
