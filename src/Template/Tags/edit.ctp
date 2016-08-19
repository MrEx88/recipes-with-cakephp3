<div class="tags form large-9 medium-8 columns content">
    <?php
    	 echo $this->Form->create($tags);
    	 echo $this->Form->hidden('add', ['value' => true]);
    ?>
    <fieldset>
    	<legend><?= __('Add Tag') ?></legend>
    	<?= $this->Form->input('name') ?>
    </fieldset>
    <?= $this->Form->button(__('Add')) ?>
    <?= $this->Form->end() ?>
    <br />
    <hr />
    <fieldset>
        <legend><?= __('Edit Tags') ?></legend>
        <?= $this->Flash->render('tags-warning') ?>
        <?php
        	echo $this->Form->create('tag');
        	echo $this->Form->hidden('add', ['value' => false]);
        ?>
        <table class="table table-striped">
        	<thead>
        		<th></th>
        		<th>Delete</th>
        	</thead>
        	<tbody>
		        <?php $i = 0; foreach ($tags as $tag): ?>
		        	<tr>
		        		<td>
		        			<?= $this->Form->hidden('tag.'.$i.'.id', ['value' => $tag->id]) ?>
		            		<?= $this->Form->input('tag.'.$i.'.name', ['value' => $tag->name, 'label' => false]) ?>
		            	</td>
		            	<td>
		            		<?= $this->Form->checkbox('tag.'.$i.'.delete', ['value' => true, 'checked' => false]) ?>
		            	</td>
		            </tr>
		        <?php $i++;
		        endforeach;?>
	        </tbody>
        </table>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
    </fieldset>
</div>
