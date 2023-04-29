<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AccountsTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('accounts');
        if ($exists) {
            $this->table('accounts')->drop()->save();
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
        $table = $this->table('accounts');

        $table->addColumn('name', 'string', ['comment' => 'Имя пользователя'])
            ->addColumn('second_name', 'string', ['comment' => 'Фамилия пользователя'])
            ->addColumn('patronymic', 'string', ['comment' => 'Отчетсво'])
            ->addColumn('userpic', 'string', ['comment' => 'Юзерпик пользователя'])
            ->addColumn('user_role_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ роли пользователя'])
            ->addForeignKey('user_role_id', 'user_role', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('gender_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ гендера'])
            ->addForeignKey('gender_id', 'genders', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addTimestamps()
            ->save();
    }
}
