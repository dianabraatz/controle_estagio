<?php
use Migrations\AbstractMigration;

class ChangeEstagiosSetPrimaryKeyAsIdentity extends AbstractMigration
{
    /**
     * Up Method.
     *
     * @return void
     */
    public function up()
    {
        $table = $this->table('estagios');
        $table->changeColumn('id', 'integer', ['identity' => true]);
        $table->update();
    }

    /**
     * Down Method.
     *
     * @return void
     */
    public function Down()
    {
        $table = $this->table('estagios');
        $table->changeColumn('id', 'integer', ['identity' => false]);
        $table->update();
    }
}
