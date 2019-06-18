<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor[]|\Cake\Collection\CollectionInterface $professores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="professores index large-9 medium-8 columns content">
    <h3><?= __('Professores') ?></h3>
    <?php
        echo $this->Form->create();
        echo $this->Form->input("busca", array('label'=>"Pesquisar Professor:"));
        //echo $this->Form->input("busca", array('label'=>"Pesquisar Aluno:", 'default'=>$this->request->query('busca')));
        echo "<button>Procurar</button>";
        //echo $this->Form->button(__('Procurar'));
        echo $this->Form->end();
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professores as $professor): ?>
            <tr>
                <td><?= $this->Number->format($professor->id) ?></td>
                <td><?= h($professor->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $professor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>
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
