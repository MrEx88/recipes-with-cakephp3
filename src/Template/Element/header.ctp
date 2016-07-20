<div class="header">
<!--
    <h1 class="display-1">My Recipes</h1>
    <nav class="navbar navbar-default">
        <div class="nav navbar-nav">
            <?= $this->Html->link('Add Recipe', ['controller' => 'Recipes', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?>
            <?= $this->Html->link('Add Tag', ['controller' => 'Tags', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?>   
            <form class="form-inline pull-right">
                <input class="form-control" type="text" placeholder="Search">
                <button class="btn btn-primary-outline" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </nav>
</div>
-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <h1>My Recipes</h1>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li>
                <span id=header-link><?= $this->Html->link('Add Recipe', ['controller' => 'Recipes', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></span>
            </li>
            <li>
                <span id=header-link><?= $this->Html->link('Add Tag', ['controller' => 'Tags', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></span>
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