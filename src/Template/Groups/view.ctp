<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="groups view large-10 medium-9 columns">
    <h2><?= h($group->name) ?></h2>
    <h3>Participants</h3>

    <div class="row">
        <div class="panel-body">

            <ul class="list-group">
                <?php foreach ($group[$group['type'] == 'catering' ? 'group_items' : 'participants'] as $item) : ?>
                    <span><?=$item['name']?></span>
                <?php endforeach; ?>
            </ul>

            <div>
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <?=
                    $this->Html->link(
                        __($group['type'] == 'catering' ? 'Add new' : 'Join'),
                        [
                            'controller' => $group['type'] == 'catering' ? 'group_items' : 'participants',
                            'action' => 'add',
                            $group['id']
                        ]
                    )
                ?>
            </div>
          </div>

        <div class="large-5 columns strings">

        </div>
    </div>
</div>
