<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserRoleTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('user_roles');
        if ($exists) {
            $this->table('user_role')->drop()->save();
        }
    }

    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('user_role');

        $table->addColumn('user_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ пользователя'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('role_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ роли'])
            ->addForeignKey('role_id', 'roles', 'id', ['update' => 'NO_ACTION'])
            ->addTimestamps()
            ->save();
    }
}

