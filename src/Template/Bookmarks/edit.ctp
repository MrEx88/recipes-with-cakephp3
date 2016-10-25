<div class="bookmarks form large-12 medium-12 columns content">
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
        <table class="table table-striped edit-bookmarks-table">
            <thead>
                <th class="bookmark-name"><?= $this->Paginator->sort('name') ?></th>
                <th class="bookmark-url"><?= $this->Paginator->sort('url', 'URL') ?></th>
                <th class="bookmark-delete">Delete</th>
            </thead>
            <tbody>
                <?php $i = 0; foreach ($bookmarks as $bookmark): ?>
                    <tr>
                        <td>
                            <?php
                                echo $this->Form->hidden('bookmark.'.$i.'.id', ['value' => $bookmark->id]);
                                echo $this->Form->input('bookmark.'.$i.'.name', ['value' => $bookmark->name, 'label' => false]); 
                            ?>
                        </td>
                        <td>
                            <?= $this->Form->input('bookmark.'.$i.'.url', ['value' => $bookmark->url, 'label' => false]);  ?>
                        </td>
                        <td>
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
