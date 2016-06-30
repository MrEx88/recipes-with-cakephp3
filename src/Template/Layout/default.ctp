<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <?= $this->Html->script("http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js") ?>
	<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') ?>
	<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js') ?>
</head>
<body>
    <div class="container">
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
        <?= $this->Flash->render() ?>
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
        <footer>
            <div class="row bottom">
                <div class="col-sm-4 hidden-xs">
                   <!-- <?=$this->Html->image('logo-footer.png', array('class'=>'img-responsive logo-footer'));?> -->
                </div>
                <div class="col-xs-12 col-sm-8 copyright">
                    &copy;&nbsp;<?=date('Y')?> My Recipes, Powered by CakePHP 3
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
