<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participant Entity.
 */
class Participant extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'group_id' => true,
        'user_id' => true,
        'group' => true,
        'user' => true,
    ];
}
