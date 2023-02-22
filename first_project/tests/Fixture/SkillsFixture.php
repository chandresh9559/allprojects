<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsFixture
 */
class SkillsFixture extends TestFixture
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
                'customer_id' => 1,
                'skill_name' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-23 08:38:03',
            ],
        ];
        parent::init();
    }
}
