<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Product extends Entity
{
  
    protected $_accessible = [
        'category_id' => true,
        'user_id' => true,
        'product_title' => true,
        'product_description' => true,
        'product_image' => true,
        'product_tags' => true,
        'status' => true,
        'delete_status' => true,
        'created_date' => true,
        'modified_date' => true,
        'product_comment' => true,
        'user' => true,
        'product_category' => true,
    ];
}
