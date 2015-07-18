<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Please enter your username and password') ?></legend>
            <?= $this->Form->input('username') ?>
            <?= $this->Form->input('password') ?>
        </fieldset>
    <?php
        echo $this->Html->link(
            'Sign in',
            '/users/add',
            array('class' => 'button')
        );
     ?>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>