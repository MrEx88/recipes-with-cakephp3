<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookmarks form large-9 medium-8 columns content">
    <?= $this->Form->create($bookmark) ?>
    <fieldset>
        <legend><?= __('Add Bookmark') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
