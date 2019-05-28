<?php
use Migrations\AbstractMigration;

class CreateDocumentos extends AbstractMigration
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
        $table = $this->table('documentos');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('descricao', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
