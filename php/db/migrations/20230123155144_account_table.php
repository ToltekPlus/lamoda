<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AccountTable extends AbstractMigration
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
            ->addTimestamps()
            ->save();
    }
}
