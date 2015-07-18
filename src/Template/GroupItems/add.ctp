<?php $this->assign('title', ' '); ?>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="groupItems form large-10 medium-9 columns">
    <?= $this->Form->create($groupItem) ?>
    <fieldset>
        <legend><?= __('Add Order Item') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Product Name']);
            echo $this->Form->input('qty');
            echo $this->Form->input('url');
            echo $this->Form->input('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
