<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubskillsFixture
 */
class SubskillsFixture extends TestFixture
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
                'skill_id' => 1,
                'subskill_name' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-23 09:29:48',
            ],
        ];
        parent::init();
    }
}
