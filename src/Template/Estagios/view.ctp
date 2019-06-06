<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estagio $estagio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estagio'), ['action' => 'edit', $estagio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estagio'), ['action' => 'delete', $estagio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estagio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estagios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estagio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estagios view large-9 medium-8 columns content">
    <h3><?= h($estagio->ano) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Aluno') ?></th>
            <td><?= $estagio->has('aluno') ? $this->Html->link($estagio->aluno->nome, ['controller' => 'Alunos', 'action' => 'view', $estagio->aluno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $estagio->has('empresa') ? $this->Html->link($estagio->empresa->nome, ['controller' => 'Empresas', 'action' => 'view', $estagio->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estagio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ano') ?></th>
            <td><?= $this->Number->format($estagio->ano) ?></td>
        </tr>
    </table>
</div>
