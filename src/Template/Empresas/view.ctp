<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa $empresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Empresa'), ['action' => 'edit', $empresa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Empresa'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empresas view large-9 medium-8 columns content">
    <h3><?= h($empresa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($empresa->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Razao Social') ?></th>
            <td><?= h($empresa->razao_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnpj') ?></th>
            <td><?= h($empresa->cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($empresa->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Alunos') ?></h4>
        <?php if (!empty($empresa->alunos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Rg') ?></th>
                <th scope="col"><?= __('Cpf') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Curso Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->alunos as $alunos): ?>
            <tr>
                <td><?= h($alunos->id) ?></td>
                <td><?= h($alunos->nome) ?></td>
                <td><?= h($alunos->rg) ?></td>
                <td><?= h($alunos->cpf) ?></td>
                <td><?= h($alunos->email) ?></td>
                <td><?= h($alunos->curso_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Alunos', 'action' => 'view', $alunos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Alunos', 'action' => 'edit', $alunos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Alunos', 'action' => 'delete', $alunos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alunos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
