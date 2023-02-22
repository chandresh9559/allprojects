<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'category_id' => 1,
                'product_title' => 'Lorem ipsum dolor sit amet',
                'product_description' => 'Lorem ipsum dolor sit amet',
                'product_image' => 'Lorem ipsum dolor sit amet',
                'product_tags' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-02-02 11:35:09',
                'modified_date' => '2023-02-02 11:35:09',
            ],
        ];
        parent::init();
    }
}
