<?php $this->assign('title', ' '); ?>
<div class="panel panel-info">
  <div class="panel-heading">
    Unde mancam azi?
  </div>  
  <div class="panel-body">
    <ul class="list-group">
        <?php foreach ($lunchGroups as $group): ?>
              <li class="list-group-item">
                <div class="row">   
                    <div class="col-md-8 gr-name">
                        <div><h4><?= $group->name;?></h3></div>
                        <div>
                            <span class="glyphicon glyphicon-time"></span><?= date('H:i', strtotime($group->due_date));?>
                        </div>                        
                    </div>
                    <div class="col-md-4 gr-action">
                        <?php if ($group->user_id === $userId): ?>
                            <span class="glyphicon glyphicon-edit"></span> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]); ?>
                            <span class="glyphicon glyphicon-log-in"></span> <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]); ?>  
                        <?php else: ?>
                           <span class="glyphicon glyphicon-log-in"></span> <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]); ?>  
                        <?php endif; ?>
                    </div>
                </div>
              </li>
        <?php endforeach; ?>
    </ul>
    <div>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?= $this->Html->link(__('Add new'), ['action' => 'addLunch']) ?>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    De unde comandam azi?
  </div>
  <div class="panel-body">
    <ul class="list-group">
        <?php foreach ($cateringGroups as $group): ?>
              <li class="list-group-item">
                <div class="row">   
                    <div class="col-md-8 gr-name">
                        <div><h4><?= $group->name;?></h3></div>
                        <div>
                            <span class="glyphicon glyphicon-time"></span><?= date('H:i', strtotime($group->due_date));?>
                        </div>                        
                    </div>
                    <div class="col-md-4 gr-action">
                        <?php if ($group->user_id === $userId): ?>
                            <span class="glyphicon glyphicon-edit"></span> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]); ?>
                            <span class="glyphicon glyphicon-log-in"></span> <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]); ?>  
                        <?php else: ?>
                           <span class="glyphicon glyphicon-log-in"></span> <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]); ?>  
                        <?php endif; ?>
                    </div>
                </div>
              </li>
        <?php endforeach; ?>
    </ul>
    <div>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <?= $this->Html->link(__('Add new'), ['action' => 'addCatering']) ?>
    </div>
  </div>
</div>