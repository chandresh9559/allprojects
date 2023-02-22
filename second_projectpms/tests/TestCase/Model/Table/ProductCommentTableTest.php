<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductCommentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductCommentTable Test Case
 */
class ProductCommentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductCommentTable
     */
    protected $ProductComment;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ProductComment',
        'app.Products',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductComment') ? [] : ['className' => ProductCommentTable::class];
        $this->ProductComment = $this->getTableLocator()->get('ProductComment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProductComment);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductCommentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductCommentTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
