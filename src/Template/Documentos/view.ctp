<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documento $documento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Documento'), ['action' => 'edit', $documento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Documento'), ['action' => 'delete', $documento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Documentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Documento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentos view large-9 medium-8 columns content">
    <h3><?= h($documento->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($documento->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($documento->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($documento->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cursos') ?></h4>
        <?php if (!empty($documento->cursos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($documento->cursos as $cursos): ?>
            <tr>
                <td><?= h($cursos->id) ?></td>
                <td><?= h($cursos->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cursos', 'action' => 'view', $cursos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cursos', 'action' => 'edit', $cursos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cursos', 'action' => 'delete', $cursos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cursos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
