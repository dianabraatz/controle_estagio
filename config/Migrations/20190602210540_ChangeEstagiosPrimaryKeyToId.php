<?php
use Migrations\AbstractMigration;

class ChangeEstagiosPrimaryKeyToId extends AbstractMigration
{
    /**
     * Up Method.
     *
     * @return void
     */
    public function up()
    {
        $table = $this->table('estagios');
        $table->changePrimaryKey(['id']);
        $table->update();
    }

    /**
     * Down Method.
     *
     * @return void
     */
    public function down()
    {
        $table = $this->table('estagios');
        $table->changePrimaryKey(['aluno_id', 'empresa_id']);
        $table->update();
    }
}
