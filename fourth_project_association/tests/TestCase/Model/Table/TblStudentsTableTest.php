<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblStudentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblStudentsTable Test Case
 */
class TblStudentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblStudentsTable
     */
    protected $TblStudents;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TblStudents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblStudents') ? [] : ['className' => TblStudentsTable::class];
        $this->TblStudents = $this->getTableLocator()->get('TblStudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TblStudents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TblStudentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
