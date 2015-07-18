<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Participant'), ['action' => 'edit', $participant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Participant'), ['action' => 'delete', $participant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="participants view large-10 medium-9 columns">
    <h2><?= h($participant->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $participant->has('group') ? $this->Html->link($participant->group->id, ['controller' => 'Groups', 'action' => 'view', $participant->group->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $participant->has('user') ? $this->Html->link($participant->user->id, ['controller' => 'Users', 'action' => 'view', $participant->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($participant->id) ?></p>
        </div>
    </div>
</div>
