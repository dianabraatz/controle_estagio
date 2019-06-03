<?php
use Migrations\AbstractMigration;

class CreateCursosDocumentos extends AbstractMigration
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
        $table = $this->table('cursos_documentos',
            ['id' => false, 'primary_key' => ['curso_id', 'documento_id']]);
        $table->addColumn('curso_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('documento_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('curso_id', 'cursos', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->addForeignKey('documento_id', 'documentos', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->create();
    }
}
