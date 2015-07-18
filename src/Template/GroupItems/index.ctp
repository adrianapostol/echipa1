<?php $this->assign('title', ' '); ?>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Group Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="groupItems index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('group_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($groupItems as $groupItem): ?>
        <tr>
            <td><?= $this->Number->format($groupItem->id) ?></td>
            <td>
                <?= $groupItem->has('group') ? $this->Html->link($groupItem->group->id, ['controller' => 'Groups', 'action' => 'view', $groupItem->group->id]) : '' ?>
            </td>
            <td>
                <?= $groupItem->has('user') ? $this->Html->link($groupItem->user->id, ['controller' => 'Users', 'action' => 'view', $groupItem->user->id]) : '' ?>
            </td>
            <td>
                <?= $groupItem->has('item') ? $this->Html->link($groupItem->item->name, ['controller' => 'Items', 'action' => 'view', $groupItem->item->id]) : '' ?>
            </td>
            <td><?= h($groupItem->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $groupItem->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $groupItem->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $groupItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupItem->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
