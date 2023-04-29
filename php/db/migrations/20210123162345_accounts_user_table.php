<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AccountsUserTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('accounts_user');
        if ($exists) {
            $this->table('accounts_user')->drop()->save();
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
        $table = $this->table('accounts_user');

        $table
            ->addColumn('user_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ пользователя'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('account_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ аккаунта'])
            ->addForeignKey('account_id', 'accounts', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addTimestamps()
            ->save();
    }
}
