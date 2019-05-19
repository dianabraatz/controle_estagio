<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $professor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Professores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="professores form large-9 medium-8 columns content">
    <?= $this->Form->create($professor) ?>
    <fieldset>
        <legend><?= __('Edit Professor') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
