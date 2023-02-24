<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikeDislikeFixture
 */
class LikeDislikeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'like_dislike';
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
                'user_id' => 1,
                'product_id' => 1,
                'promote' => 'Lorem ipsum dolor sit amet',
                'demote' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
