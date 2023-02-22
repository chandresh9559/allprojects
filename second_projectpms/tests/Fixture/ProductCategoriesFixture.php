<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductCategoriesFixture
 */
class ProductCategoriesFixture extends TestFixture
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
                'category_id' => 1,
                'category_name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created_date' => '2023-02-02 11:34:55',
                'modified_date' => '2023-02-02 11:34:55',
            ],
        ];
        parent::init();
    }
}
