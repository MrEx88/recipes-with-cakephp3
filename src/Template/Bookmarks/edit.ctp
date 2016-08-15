<div class="bookmarks form large-9 medium-8 columns content">
    <?php 
        echo $this->Form->create($bookmark);
        echo $this->Form->hidden('add', ['value' => true]); 
    ?>
    <fieldset>
        <legend><?= __('Add Bookmark') ?></legend>
        <?php
            
            echo $this->Form->input('name');
            echo $this->Form->input('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Add')) ?>
    <?= $this->Form->end() ?>
    <br />
    <hr />
    <fieldset>
        <legend><?= __('Edit Bookmarks') ?></legend>
        <?php
            echo $this->Form->create('bookmark');
            echo $this->Form->hidden('add', ['value' => false]);
        ?>
        <table class="table table-striped">
            <thead>
                <th></th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php $i = 0; foreach ($bookmarks as $bookmark): ?>
                    <tr>
                        <td style="width=90%;">
                            <?php
                                echo $this->Form->hidden('bookmark.'.$i.'.id', ['value' => $bookmark->id]);
                                echo $this->Form->input('bookmark.'.$i.'.name', ['value' => $bookmark->name]);
                                echo $this->Form->input('bookmark.'.$i.'.url', ['value' => $bookmark->url, 'label' => 'URL']); 
                            ?>
                        </td>
                        <td style="width=*;">
                            <?= $this->Form->checkbox('bookmark.'.$i.'.delete', ['value' => true, 'checked' => false]) ?>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Form->button(__('Update')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>
