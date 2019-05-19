<div class="users login large-9 medium-8 columns content">
    <h1>Login</h1>
    
    <div class="form">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Credentials') ?></legend>
            <?= $this->Form->control('username', ['required' => true]) ?>
            <?= $this->Form->control('password', ['required' => true]) ?>
            <?= $this->Form->button(__('Login')) ?>
            <?= $this->Form->end() ?>
        </fieldset>
    </div>
</div>
