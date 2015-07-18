<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 */
class Item extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'location_id' => true,
        'name' => true,
        'url' => true,
        'location' => true,
    ];
}
