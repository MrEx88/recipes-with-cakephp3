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

$appName = 'My Recipes';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $appName ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    
    <!-- For Windows: It needs to be file system paths -->
    <!-- TODO: Figure out how to get this css to work -->
    <link href='<?= WWW_ROOT ?>css\bootstrap.css' rel='stylesheet' type='text/css' />
    <link href='<?= WWW_ROOT ?>css\recipes.css' rel='stylesheet' type='text/css' />
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="container">
        <?= $this->Flash->render() ?>
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
        <footer>
            <div class="row bottom">
                <div class="col-xs-12 col-sm-8 copyright">
                    &copy;&nbsp;<?=date('Y')?> My Recipes, Powered by CakePHP <?= $this->Misc->getCakeVersion() ?>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
