<?php 
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->minLength('name', 10)
            ->email('email');

        return $validator;
    }

    protected function _execute(array $data): bool
    {
        $name = $data['name'];
        $email = $data['email'];
        $body = $data['body'];
     
        $mailer = new Mailer('default');
        $mailer
            ->setTransport('gmail') //your email configuration name
            ->setFrom(['chandreshck9559@gmail.com' => 'Code The Pixel'])
            ->setTo('chandreshck9559@gmail.com')
            ->setEmailFormat('html')
            ->setSubject('Verify New Account')
            ->deliver('The new entry added
                       Name:'.$name.'
                       Email:'.$email.'
                       Body:'.$body.'
                       Contact to meet them.'
                    );
        return true;
    }
}
?>