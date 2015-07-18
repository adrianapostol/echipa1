<?php $this->assign('title', ' '); ?>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Group Item'), ['action' => 'edit', $groupItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group Item'), ['action' => 'delete', $groupItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Group Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="groupItems view large-10 medium-9 columns">
    <h2><?= h($groupItem->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $groupItem->has('group') ? $this->Html->link($groupItem->group->id, ['controller' => 'Groups', 'action' => 'view', $groupItem->group->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $groupItem->has('user') ? $this->Html->link($groupItem->user->id, ['controller' => 'Users', 'action' => 'view', $groupItem->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $groupItem->has('item') ? $this->Html->link($groupItem->item->name, ['controller' => 'Items', 'action' => 'view', $groupItem->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($groupItem->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($groupItem->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Url') ?></h6>
            <?= $this->Text->autoParagraph(h($groupItem->url)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Details') ?></h6>
            <?= $this->Text->autoParagraph(h($groupItem->details)) ?>
        </div>
    </div>
</div>
