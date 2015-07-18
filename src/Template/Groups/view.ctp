<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Group Items'), ['controller' => 'GroupItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group Item'), ['controller' => 'GroupItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="groups view large-10 medium-9 columns">
    <h2><?= h($group->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $group->has('user') ? $this->Html->link($group->user->id, ['controller' => 'Users', 'action' => 'view', $group->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Location') ?></h6>
            <p><?= $group->has('location') ? $this->Html->link($group->location->name, ['controller' => 'Locations', 'action' => 'view', $group->location->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($group->type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($group->id) ?></p>
            <h6 class="subheader"><?= __('Started') ?></h6>
            <p><?= $this->Number->format($group->started) ?></p>
            <h6 class="subheader"><?= __('Ended') ?></h6>
            <p><?= $this->Number->format($group->ended) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created At') ?></h6>
            <p><?= h($group->created_at) ?></p>
            <h6 class="subheader"><?= __('Updated At') ?></h6>
            <p><?= h($group->updated_at) ?></p>
            <h6 class="subheader"><?= __('Due Date') ?></h6>
            <p><?= h($group->due_date) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Group Items') ?></h4>
    <?php if (!empty($group->group_items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Group Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Item Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Url') ?></th>
            <th><?= __('Details') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($group->group_items as $groupItems): ?>
        <tr>
            <td><?= h($groupItems->id) ?></td>
            <td><?= h($groupItems->group_id) ?></td>
            <td><?= h($groupItems->user_id) ?></td>
            <td><?= h($groupItems->item_id) ?></td>
            <td><?= h($groupItems->name) ?></td>
            <td><?= h($groupItems->url) ?></td>
            <td><?= h($groupItems->details) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'GroupItems', 'action' => 'view', $groupItems->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'GroupItems', 'action' => 'edit', $groupItems->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GroupItems', 'action' => 'delete', $groupItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupItems->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Participants') ?></h4>
    <?php if (!empty($group->participants)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Group Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($group->participants as $participants): ?>
        <tr>
            <td><?= h($participants->id) ?></td>
            <td><?= h($participants->group_id) ?></td>
            <td><?= h($participants->user_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Participants', 'action' => 'view', $participants->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Participants', 'action' => 'edit', $participants->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Participants', 'action' => 'delete', $participants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participants->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
