<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class ProductCategory extends Entity{
    protected $_accessible=[
        'category_name'=>true,
        'status'=>true,
        'created_date'=>true,
        'modified_date'=>true,
        'products'=>true,
    ];
}

?>