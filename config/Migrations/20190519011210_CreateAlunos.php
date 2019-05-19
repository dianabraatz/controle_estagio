<?php
use Migrations\AbstractMigration;

class CreateAlunos extends AbstractMigration
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
        $table = $this->table('alunos');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('rg', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('curso_id', 'integer', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addForeignKey('curso_id', 'cursos', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->create();
    }
}
