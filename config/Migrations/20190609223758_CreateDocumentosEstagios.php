<?php
use Migrations\AbstractMigration;

class CreateDocumentosEstagios extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('documentos_estagios',
            ['id' => false, 'primaryKey' => ['documento_id', 'estagio_id']]);
        $table->addColumn('documento_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('estagio_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('entregue', 'boolean', [
            'default' => false,
            'null' => false,
        ]);
        $table->addColumn('data_entrega', 'timestamp', [
            'default' => null,
            'null' => true,
        ]);
        $table->addForeignKey('documento_id', 'documentos', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->addForeignKey('estagio_id', 'estagios', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->create();
    }
}
