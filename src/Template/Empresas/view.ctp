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
        <li><?= $this->Html->link(__('List Estagios'), ['controller' => 'Estagios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estagio'), ['controller' => 'Estagios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empresas view large-9 medium-8 columns content">
    <h3><?= h($empresa->nome) ?></h3>
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
        <h4><?= __('Related Estagios') ?></h4>
        <?php if (!empty($empresa->estagios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Aluno Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ano') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->estagios as $estagios): ?>
            <tr>
                <td><?= h($estagios->aluno_id) ?></td>
                <td><?= h($estagios->empresa_id) ?></td>
                <td><?= h($estagios->id) ?></td>
                <td><?= h($estagios->ano) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Estagios', 'action' => 'view', $estagios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Estagios', 'action' => 'edit', $estagios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estagios', 'action' => 'delete', $estagios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estagios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
