<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aluno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estagios'), ['controller' => 'Estagios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estagio'), ['controller' => 'Estagios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= __('Alunos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('rg') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('cpf') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('curso_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
            <tr>
                <!--<td><?= $this->Number->format($aluno->id) ?></td>-->
                <td><?= h($aluno->nome) ?></td>
                <!--<td><?= h($aluno->rg) ?></td>-->
                <!--<td><?= h($aluno->cpf) ?></td>-->
                <td><?= h($aluno->email) ?></td>
                <td><?= $aluno->has('curso') ? $this->Html->link($aluno->curso->nome, ['controller' => 'Cursos', 'action' => 'view', $aluno->curso->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aluno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aluno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aluno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aluno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
