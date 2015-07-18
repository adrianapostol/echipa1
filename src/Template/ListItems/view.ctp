<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit List Item'), ['action' => 'edit', $listItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete List Item'), ['action' => 'delete', $listItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New List Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lists'), ['controller' => 'Lists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New List'), ['controller' => 'Lists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="listItems view large-10 medium-9 columns">
    <h2><?= h($listItem->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('List') ?></h6>
            <p><?= $listItem->has('list') ? $this->Html->link($listItem->list->id, ['controller' => 'Lists', 'action' => 'view', $listItem->list->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $listItem->has('user') ? $this->Html->link($listItem->user->id, ['controller' => 'Users', 'action' => 'view', $listItem->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $listItem->has('item') ? $this->Html->link($listItem->item->name, ['controller' => 'Items', 'action' => 'view', $listItem->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($listItem->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($listItem->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Url') ?></h6>
            <?= $this->Text->autoParagraph(h($listItem->url)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Details') ?></h6>
            <?= $this->Text->autoParagraph(h($listItem->details)) ?>
        </div>
    </div>
</div>
