<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentosEstagiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentosEstagiosTable Test Case
 */
class DocumentosEstagiosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentosEstagiosTable
     */
    public $DocumentosEstagios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DocumentosEstagios',
        'app.Documentos',
        'app.Estagios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DocumentosEstagios') ? [] : ['className' => DocumentosEstagiosTable::class];
        $this->DocumentosEstagios = TableRegistry::getTableLocator()->get('DocumentosEstagios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentosEstagios);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
