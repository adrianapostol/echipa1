<?php $this->assign('title', ' '); ?>
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Please enter your username and password') ?></legend>
            <?= $this->Form->input('username') ?>
            <?= $this->Form->input('password') ?>
        </fieldset>

    <?= $this->Form->button(__('Login'), ['class' => 'left']); ?>

    <?php
        echo $this->Html->link(
            'Sign in',
            '/users/add',
            array('class' => 'button right')
        );
     ?>
    <?= $this->Form->end() ?>
</div>