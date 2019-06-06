<?php
use Migrations\AbstractMigration;

class ChangeAlunosEmpresasToEstagios extends AbstractMigration
{
    /**
     * Change method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('alunos_empresas');

        $table->addIndex('aluno_id');
        $table->addColumn('id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('ano', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->rename('estagios');

        $table->update();
    }
}
