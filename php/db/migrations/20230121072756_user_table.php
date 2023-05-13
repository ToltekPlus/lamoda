<?php
declare(strict_types=1);
use Phinx\Migration\AbstractMigration;

final class UserTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('users');
        if ($exists) {
            $this->table('users')->drop()->save();
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
        $table = $this->table('users');

        $table->addColumn('email', 'string', ['comment' => 'Почта пользователя'])
            ->addColumn('password', 'string', ['comment' => 'Пароль пользователя'])
            ->addTimestamps()
            ->addColumn('last_at', 'datetime', ['comment' => 'Последнее посещение'])
            ->create();
    }
}
