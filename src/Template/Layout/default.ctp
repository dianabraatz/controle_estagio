<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
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

    <?= $this->Html->css('w3.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('choices/choices.css') ?>
    <?= $this->Html->css('sidebar.css') ?>

    <?= $this->Html->script('choices/choices.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <div class="top-bar-section">
            <ul class="left">
                <li>
                    <a href="#" id="sidebarButton" class="w3-center">&#9776;</a>
                </li>
            </ul>
        </div>
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?= $this->Html->link($this->fetch('title'), ['action' => 'index']) ?></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>

    <div id="overlay" class="w3-overlay w3-animate-opacity"></div>
    <nav id="sidebar" class="w3-sidebar w3-card w3-indigo">
        <ul class="w3-ul">
            <li><?= $this->Html->link('Alunos',      ['controller' => 'Alunos',      'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Cursos',      ['controller' => 'Cursos',      'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Documentos',  ['controller' => 'Documentos',  'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Empresas',    ['controller' => 'Empresas',    'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Estágios',    ['controller' => 'Estagios',    'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Professores', ['controller' => 'Professores', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Users'),   ['controller' => 'Users',       'action' => 'index']) ?></li>
        </ul>
    </nav>

    <?= $this->Flash->render() ?>

    <div class="main-content container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <script>
    ;(function() {
        new Choices("select:not([multiple])");
        new Choices("select[multiple]", { removeItemButton: true });
    })();
    </script>

    <?= $this->Html->script('sidebar.js') ?>

    <footer>
    </footer>
</body>
</html>
