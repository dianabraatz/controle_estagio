<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documento[]|\Cake\Collection\CollectionInterface $documentos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Documento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="documentos index large-9 medium-8 columns content">
    <h3><?= __('Documentos') ?></h3>
    <?php
        echo $this->Form->create();
        echo $this->Form->input("busca", array('label'=>"Pesquisar Documento:"));
        //echo $this->Form->input("busca", array('label'=>"Pesquisar Aluno:", 'default'=>$this->request->query('busca')));
        echo "<button>Procurar</button>";
        //echo $this->Form->button(__('Procurar'));
        echo $this->Form->end();
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documentos as $documento): ?>
            <tr>
                <td><?= h($documento->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $documento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id)]) ?>
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
