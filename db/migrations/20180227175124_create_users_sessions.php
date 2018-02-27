<?php


use Phinx\Migration\AbstractMigration;

class CreateUsersSessions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $current_sessions = $this->table('users');

        $current_sessions->addColumn('user_id','integer')
                 ->addColumn('ip','string',array('limit'=>45))
                 ->addColumn('salt','string',array('limit'=>45))
                 ->addColumn('hash','text')
                 ->addIndex('user_id',array('unique'=>TRUE))
                 ->create();
    }
}
