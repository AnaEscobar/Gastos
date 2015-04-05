<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expense Entity.
 */
class Expense extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'comentarios' => true,
        'valor' => true,
        'fecha' => true,
        'role_id' => true,
        'type_id' => true,
        'periodicity_id' => true,
        'user_id' => true,
        'type' => true,
        'periodicity' => true,
        'user' => true,
    ];
}
