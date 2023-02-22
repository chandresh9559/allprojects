<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductCommentsFixture
 */
class ProductCommentsFixture extends TestFixture
{
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
                'created_date' => '2023-01-30 07:09:03',
                'modified_date' => '2023-01-30 07:09:03',
            ],
        ];
        parent::init();
    }
}
