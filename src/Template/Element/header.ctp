<div class="header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h1><?= $this->Html->link(__('My Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></h1>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <span id=header-link><?= $this->Html->link('Add Recipe', ['controller' => 'Recipes', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></span>
                </li>
                <!-- TODO: Make a dropdown for tags -->
                <li>
                    <span id=header-link><?= $this->Html->link('Add Tag', ['controller' => 'Tags', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></span>
                </li>
                <li>
                    <span id=header-link><?= $this->Html->link('Edit Tags', ['controller' => 'Tags', 'action' => 'edit'], ['class' => 'nav-item nav-link active']) ?></span>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?= $this->Form->create(null, ['type' => 'GET', 'url' => ['controller' => 'Recipes', 'action' => 'search']]) ?>
                <li>
                    <?= $this->Form->input('q', ['div' => false, 'label' => false, 'placeholder' => 'Search', 'id' => 'search_keywords']) ?>
                </li>
                <li>
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-search" type="submit"><span class="glyphicon glyphicon-search"></span></button>
				    </span>                    
                </li>
                <?= $this->Form->end() ?>
            </ul>
        </div>
    </nav>
</div>