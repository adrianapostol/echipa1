<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ListItem Entity.
 */
class ListItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'list_id' => true,
        'user_id' => true,
        'item_id' => true,
        'name' => true,
        'url' => true,
        'details' => true,
        'list' => true,
        'user' => true,
        'item' => true,
    ];
}
