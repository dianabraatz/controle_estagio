<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cursos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Documentos'), ['controller' => 'Documentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Documento'), ['controller' => 'Documentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cursos form large-9 medium-8 columns content">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Add Curso') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('documentos._ids', ['options' => $documentos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
