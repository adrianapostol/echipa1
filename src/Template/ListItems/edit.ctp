<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $listItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $listItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lists'), ['controller' => 'Lists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New List'), ['controller' => 'Lists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="listItems form large-10 medium-9 columns">
    <?= $this->Form->create($listItem) ?>
    <fieldset>
        <legend><?= __('Edit List Item') ?></legend>
        <?php
            echo $this->Form->input('list_id', ['options' => $lists]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('name');
            echo $this->Form->input('url');
            echo $this->Form->input('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
