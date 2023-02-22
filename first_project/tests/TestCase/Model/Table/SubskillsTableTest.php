<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubskillsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubskillsTable Test Case
 */
class SubskillsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubskillsTable
     */
    protected $Subskills;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Subskills',
        'app.Skills',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Subskills') ? [] : ['className' => SubskillsTable::class];
        $this->Subskills = $this->getTableLocator()->get('Subskills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Subskills);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SubskillsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SubskillsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
