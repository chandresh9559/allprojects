<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ProductComments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'user_id',
        ]);
      
        $this->hasOne('UserProfile',['dependent'=>true]);
       
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->email('email',true,'Please enter a valid email')
        ->maxLength('email', 50)
        ->requirePresence('email', 'create')
        ->notEmptyString('email','Email is Required')
        ->add('email','unique',[
            'rule'=>'validateUnique',
            'provider'=>'table',
            'message'=>'This Email is Already Exists',
        ],
        
        );

    $validator
        ->scalar('password')
        ->requirePresence('password', 'create')
        ->notEmptyString('password','Password is Required')
        ->minLength('password',8,'minimum eight characters, at least one letter and one number')
        ->add('password',[
            'upperCase'=>[
            'rule' => ['custom', '/(?=.*?[A-Z])/'],
            'message' => 'add one upper case'],

            'lowerCase'=>[
                'rule' => ['custom','/(?=.*?[a-z])/'],
                'message'=>'add one lower case',
            ],

            'number'=>[
                'rule'=>['custom','/(?=.*?[0-9])/'],
                'message' => 'add one number',
            ],

            'specialChar'=>[
                'rule'=>['custom','/(?=.*?[#?!@$%^&*-])/'],
                'message'=>'add one special character'
            ],
            
        ]);
    $validator
        ->scalar('Confirm_password')
        ->requirePresence('Confirm_password', 'create')
        ->notEmptyString('Confirm_password','Confirm Password is Required')
        ->minLength('Confirm_password',8,'minimum eight characters, at least one letter and one number')
        ->add('Confirm_password',[
            'upperCase'=>[
            'rule' => ['custom', '/(?=.*?[A-Z])/'],
            'message' => 'add one upper case'],

            'lowerCase'=>[
                'rule' => ['custom','/(?=.*?[a-z])/'],
                'message'=>'add one lower case',
            ],

            'number'=>[
                'rule'=>['custom','/(?=.*?[0-9])/'],
                'message' => 'add one number',
            ],

            'specialChar'=>[
                'rule'=>['custom','/(?=.*?[#?!@$%^&*-])/'],
                'message'=>'add one special character'
            ],

            'compare'=>[
                'rule'=>['compareWith','password'],
                'message'=>'confirm password does not matched',
            ],
            
        ]);
        $validator
            ->integer('user_type')
            ->notEmptyString('user_type');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->notEmptyDateTime('modified_date');


        $validator
            ->scalar('image')
            ->maxLength('image', 100)
            // ->requirePresence('image', 'create')
            ->notEmptyString('image' ,'Upload Your Image');

        return $validator;
    }

  
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
