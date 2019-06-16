<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentosEstagiosFixture
 */
class DocumentosEstagiosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'documento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'estagio_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'entregue' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'data_entrega' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'documento_id' => ['type' => 'index', 'columns' => ['documento_id'], 'length' => []],
            'estagio_id' => ['type' => 'index', 'columns' => ['estagio_id'], 'length' => []],
        ],
        '_constraints' => [
            'documentos_estagios_ibfk_1' => ['type' => 'foreign', 'columns' => ['documento_id'], 'references' => ['documentos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'documentos_estagios_ibfk_2' => ['type' => 'foreign', 'columns' => ['estagio_id'], 'references' => ['estagios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'documento_id' => 1,
                'estagio_id' => 1,
                'entregue' => 1,
                'data_entrega' => 1560701756
            ],
        ];
        parent::init();
    }
}
