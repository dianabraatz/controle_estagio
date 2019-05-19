<?php
use Migrations\AbstractMigration;

class CreateAlunosEmpresas extends AbstractMigration
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
        $table = $this->table('alunos_empresas',
            ['id' => false, 'primary_key' => ['aluno_id', 'empresa_id']]);
        $table->addColumn('aluno_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('empresa_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('aluno_id', 'alunos', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->addForeignKey('empresa_id', 'empresas', 'id', [
            'delete' => 'RESTRICT',
            'update' => 'RESTRICT',
        ]);
        $table->create();
    }
}
