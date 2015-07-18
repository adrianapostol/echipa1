
<div class="panel panel-info">
  <div class="panel-heading">
    Unde mancam azi?
  </div>  
  <div class="panel-body">
    <ul class="list-group">
        <?php foreach ($lunchGroups as $group): ?>
              <li class="list-group-item">
                <?= $group->name;?>
              </li>
        <?php endforeach; ?>
    </ul>
    <div>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
        <?= $this->Html->link(__('Add new'), ['action' => 'addCatering']) ?>
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
              <li class="list-group-item"><?= $group->name;?><br/></li>
        <?php endforeach; ?>
    </ul>
    <div>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <?= $this->Html->link(__('Add new'), ['action' => 'addLunch']) ?>
    </div>
  </div>
</div>