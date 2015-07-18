<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Group Items'), ['controller' => 'GroupItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group Item'), ['controller' => 'GroupItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="groups index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('location_id') ?></th>
            <th><?= $this->Paginator->sort('created_at') ?></th>
            <th><?= $this->Paginator->sort('updated_at') ?></th>
            <th><?= $this->Paginator->sort('due_date') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= $this->Number->format($group->id) ?></td>
            <td>
                <?= $group->has('user') ? $this->Html->link($group->user->id, ['controller' => 'Users', 'action' => 'view', $group->user->id]) : '' ?>
            </td>
            <td>
                <?= $group->has('location') ? $this->Html->link($group->location->name, ['controller' => 'Locations', 'action' => 'view', $group->location->id]) : '' ?>
            </td>
            <td><?= h($group->created_at) ?></td>
            <td><?= h($group->updated_at) ?></td>
            <td><?= h($group->due_date) ?></td>
            <td><?= h($group->type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?>
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
