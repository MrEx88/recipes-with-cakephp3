<div class="jumbotron">
    <h1 class="display-1">My Recipes</h1>
    <nav class="navbar navbar-dark bg-inverse">
        <div class="nav navbar-nav">
            <?= $this->Html->link('Add Recipe', ['controller' => 'Recipes', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?>
            <?= $this->Html->link('Add Tag', ['controller' => 'Tags', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?>   
            <form class="form-inline pull-xs-right">
                <input class="form-control" type="text" placeholder="Search">
                <button class="btn btn-primary-outline" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </nav>
</div>