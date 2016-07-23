<div class="header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h1>My Recipes</h1>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <span id=header-link><?= $this->Html->link('Add Recipe', ['controller' => 'Recipes', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></span>
                </li>
                <!-- TODO: Make a dropdown for tags -->
                <li>
                    <span id=header-link><?= $this->Html->link('Add Tag', ['controller' => 'Tags', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></span>
                </li>
                <li><!-- TODO: Make edit view like index, but each row is editable. And try to use patchEntities() in edit action -->
                    <span id=header-link><?= $this->Html->link('Edit Tags', ['controller' => 'Tags', 'action' => 'index'], ['class' => 'nav-item nav-link active']) ?></span>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?= $this->Form->create() ?>
                <li>
                    <?= $this->Form->iconPostLink('', ['controller' => 'recipes', 'action' => 'tags'], 'search', ['class' => 'header-form-post']) ?>
                </li>
                <li>
                    <?= $this->Form->input('', ['placeholder' => 'Search']) ?>
                </li>
                <?= $this->Form->end() ?>
            </ul>
        </div>
    </nav>
</div>