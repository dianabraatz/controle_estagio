<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estagio[]|\Cake\Collection\CollectionInterface $estagios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estagio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estagios index large-9 medium-8 columns content">
    <h3><?= __('Estagios') ?></h3>
    <?php
        echo $this->Form->create();
        echo $this->Form->input("busca", array('label'=>"Pesquisar Estágio:"));
        //echo $this->Form->input("busca", array('label'=>"Pesquisar Aluno:", 'default'=>$this->request->query('busca')));
        //echo "<button>Procurar</button>";
        echo $this->Form->button(__('Procurar'));
        echo $this->Form->end();
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('aluno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ano') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estagios as $estagio): ?>
            <tr>
                <td><?= $estagio->has('aluno') ? $this->Html->link($estagio->aluno->nome, ['controller' => 'Alunos', 'action' => 'view', $estagio->aluno->id]) : '' ?></td>
                <td><?= $estagio->has('empresa') ? $this->Html->link($estagio->empresa->nome, ['controller' => 'Empresas', 'action' => 'view', $estagio->empresa->id]) : '' ?></td>
                <td><?= $this->Number->format($estagio->id) ?></td>
                <td><?= $this->Number->format($estagio->ano) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estagio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estagio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estagio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estagio->id)]) ?>
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
