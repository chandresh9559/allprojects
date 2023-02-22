<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class ProductComment extends Entity
{
   
    protected $_accessible = [
        'product_id' => true,
        'user_id' => true,
        'email' => true,
        'comment' => true,
        'created_date' => true,
        'product' => true,
        'user' => true,
    ];
}
