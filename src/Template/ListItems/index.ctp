<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New List Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lists'), ['controller' => 'Lists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New List'), ['controller' => 'Lists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="listItems index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('list_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listItems as $listItem): ?>
        <tr>
            <td><?= $this->Number->format($listItem->id) ?></td>
            <td>
                <?= $listItem->has('list') ? $this->Html->link($listItem->list->id, ['controller' => 'Lists', 'action' => 'view', $listItem->list->id]) : '' ?>
            </td>
            <td>
                <?= $listItem->has('user') ? $this->Html->link($listItem->user->id, ['controller' => 'Users', 'action' => 'view', $listItem->user->id]) : '' ?>
            </td>
            <td>
                <?= $listItem->has('item') ? $this->Html->link($listItem->item->name, ['controller' => 'Items', 'action' => 'view', $listItem->item->id]) : '' ?>
            </td>
            <td><?= h($listItem->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $listItem->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $listItem->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $listItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listItem->id)]) ?>
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
