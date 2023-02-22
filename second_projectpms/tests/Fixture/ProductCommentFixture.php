<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductCommentFixture
 */
class ProductCommentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'product_comment';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'product_id' => 1,
                'user_id' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-02-01 03:55:51',
            ],
        ];
        parent::init();
    }
}
