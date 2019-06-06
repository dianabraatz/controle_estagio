<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstagiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstagiosTable Test Case
 */
class EstagiosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstagiosTable
     */
    public $Estagios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estagios',
        'app.Alunos',
        'app.Empresas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Estagios') ? [] : ['className' => EstagiosTable::class];
        $this->Estagios = TableRegistry::getTableLocator()->get('Estagios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estagios);

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
