<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="groups view large-10 medium-9 columns">
    <h2><?= h($group->name) ?></h2>
    <h3> <?= $group['type'] == 'catering' ? 'Order List' : 'Participants' ?> </h3>

    <div class="row">
        <div class="panel-body">
            <?php if (count($items)): ?>
                <table class="table table-striped">
                    <?php if ($groupType == 'catering'): ?>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Details</th>
                            <th>User</th>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <th>Username</th>
                        </tr>
                    <?php endif;?>

                    <?php foreach ($group[$groupType == 'catering' ? 'group_items' : 'participants'] as $item) : ?>
                        <?php if ($groupType == 'catering'): ?>
                            <tr>
                                <td><?=$item['name']?></td>
                                <td><?=$item['qty']?></td>
                                <td><?=$item['details']?></td>
                                <td><?=$users[$item['user_id']]['username']?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td><?=$users[$item['user_id']]['username']?></td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach; ?>
                </table>

            <?php else: ?>
                <p>
                    <?= 'No ' . ($groupType == 'catering' ? 'items ordered' : 'participants') . ', just yet :)' ?>
                <?p>
            <?php endif; ?>

            <div>
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <?=
                    $this->Html->link(
                        __($group['type'] == 'catering' ? 'Add new' : 'Join'),
                        [
                            'controller' => $groupType == 'catering' ? 'group_items' : 'participants',
                            'action' => 'add',
                            $group['id']
                        ]
                    )
                ?>
            </div>
        </div>
    </div>
</div>
