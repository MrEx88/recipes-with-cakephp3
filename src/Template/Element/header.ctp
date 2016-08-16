<div class="header">
<nav class="navbar navbar-default" role="navigation">
    <!-- Branding -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    <?= $this->Html->link(__('My Recipes'), ['controller' => 'Recipes', 'action' => 'index'], ['class' => 'navbar-brand']) ?>
    </div>

    <!-- Nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><?= $this->Html->link('Add Recipe', ['controller' => 'Recipes', 'action' => 'add'], ['class' => 'nav-item nav-link active']) ?></li>
            <li><?= $this->Html->link('Edit Recipe Tags', ['controller' => 'Tags', 'action' => 'edit'], ['class' => 'nav-item nav-link active']) ?></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bookmarks<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <!-- TODO: Maybe use actual google icon with color -->
                    <li><?= $this->Html->iconButtonLink('google', 'http://www.google.com', 'google', ['isFa' => true, 'class' => 'nav-item nav-link active', 'target' => '_blank']) ?></li>
                    <li class="divider"></li>
                    <?php foreach($this->Misc->bookmarks() as $bookmark): ?>
                        <li><?= $this->Html->iconButtonLink($bookmark->name, $bookmark->url, 'globe', ['class' => 'mav-item nav-link active', 'target' => '_blank'])?></li>
                    <?php endforeach; ?>
                    <li class="divider"></li>
                    <li><?= $this->Html->link('Edit bookmarks', ['controller' => 'Bookmarks', 'action' => 'edit'], ['class' => 'nav-item nav-link active']) ?></li>
                </ul>
            </li>
        </ul>
        <div class="col-sm-3 col-md-3 navbar-right">
            <?= $this->Form->create(null, ['type' => 'GET', 'url' => ['controller' => 'Recipes', 'action' => 'search'], ['class' => 'navbar-form', 'role' => 'search']]) ?>
            <div class="input-group">
                <?= $this->Form->input('q', ['label' => false, 'placeholder' => 'Recipe Search', 'id' => 'search_keywords', 'class' => 'form-control']) ?>
                <div class="input-group-btn">
                    <?= $this->Form->button("<span class='glyphicon glyphicon-search'></span>", ['class' => 'btn btn-default', 'type' => 'submit']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
        </div>
    </div><!-- /.navbar-collapse -->
</nav>
</div>