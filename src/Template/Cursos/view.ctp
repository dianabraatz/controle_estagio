<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Checklist'), ['action' => 'checklist', $curso->id]) ?></li>
        <li><?= $this->Html->link(__('Edit Curso'), ['action' => 'edit', $curso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Curso'), ['action' => 'delete', $curso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cursos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Documentos'), ['controller' => 'Documentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documento'), ['controller' => 'Documentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cursos view large-9 medium-8 columns content">
    <h3><?= h($curso->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($curso->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($curso->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Documentos') ?></h4>
        <?php if (!empty($curso->documentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($curso->documentos as $documentos): ?>
            <tr>
                <td><?= h($documentos->id) ?></td>
                <td><?= h($documentos->nome) ?></td>
                <td><?= h($documentos->descricao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Documentos', 'action' => 'view', $documentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Documentos', 'action' => 'edit', $documentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Documentos', 'action' => 'delete', $documentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Alunos') ?></h4>
        <?php if (!empty($curso->alunos)): ?>
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
            <?php foreach ($curso->alunos as $alunos): ?>
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
