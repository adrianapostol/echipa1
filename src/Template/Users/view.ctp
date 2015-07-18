<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Group Items'), ['controller' => 'GroupItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group Item'), ['controller' => 'GroupItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($user->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Group Items') ?></h4>
    <?php if (!empty($user->group_items)): ?>
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
        <?php foreach ($user->group_items as $groupItems): ?>
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
    <h4 class="subheader"><?= __('Related Groups') ?></h4>
    <?php if (!empty($user->groups)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Location Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Due Date') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('Started') ?></th>
            <th><?= __('Ended') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->groups as $groups): ?>
        <tr>
            <td><?= h($groups->id) ?></td>
            <td><?= h($groups->user_id) ?></td>
            <td><?= h($groups->location_id) ?></td>
            <td><?= h($groups->name) ?></td>
            <td><?= h($groups->created) ?></td>
            <td><?= h($groups->modified) ?></td>
            <td><?= h($groups->due_date) ?></td>
            <td><?= h($groups->type) ?></td>
            <td><?= h($groups->started) ?></td>
            <td><?= h($groups->ended) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>

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
    <?php if (!empty($user->participants)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Group Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->participants as $participants): ?>
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
