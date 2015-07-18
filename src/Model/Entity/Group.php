<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity.
 */
class Group extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'location_id' => true,
        'created_at' => true,
        'updated_at' => true,
        'due_date' => true,
        'type' => true,
        'started' => true,
        'ended' => true,
        'user' => true,
        'location' => true,
        'group_items' => true,
        'participants' => true,
    ];
}
