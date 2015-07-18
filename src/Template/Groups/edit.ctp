<?php $this->assign('title', ' '); ?>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="groups form large-10 medium-9 columns">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Edit Group') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('due_date');
            echo $this->Form->hidden('started', ['id' => 'inputStarted']);
            echo $this->Form->hidden('ended', ['id' => 'inputEnded']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>

    <?= !$group->started && !$group->ended ? $this->Form->button('Start', ['type' => 'button', 'id' => 'btnStart']) : '' ?>

    <?= !$group->ended ? $this->Form->button('End', ['type' => 'button', 'id' => 'btnEnd']) : '' ?>

    <?= $this->Form->end() ?>
</div>

<script>
    $('#btnStart').on('click', function () {
        $('#inputStarted').val(1);
        $('form').submit();
    });

    $('#btnEnd').on('click', function () {
        $('#inputEnded').val(1);
        $('form').submit();
    });
</script>
