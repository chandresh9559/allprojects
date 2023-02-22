<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class User extends Entity
{
    
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'user_type' => true,
        'status' => true,
        'image' => true,
        'created_date' => true,
        'modified_date' => true,
        'user_profile' => true,
        // 'products' => true,
        // 'product_comment' => true,
    ];

  
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
