<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GroupItem Entity.
 */
class GroupItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'group_id' => true,
        'user_id' => true,
        'item_id' => true,
        'name' => true,
        'qty' => true,
        'url' => true,
        'details' => true,
        'group' => true,
        'user' => true,
        'item' => true,
    ];
}
