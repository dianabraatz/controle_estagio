<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estagio $estagio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Estagios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estagios form large-9 medium-8 columns content">
    <?= $this->Form->create($estagio) ?>
    <fieldset>
        <legend><?= __('Add Estagio') ?></legend>
        <?php
            echo $this->Form->control('aluno_id', ['options' => $alunos]);
            echo $this->Form->control('empresa_id', ['options' => $empresas]);
            echo $this->Form->control('ano');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
