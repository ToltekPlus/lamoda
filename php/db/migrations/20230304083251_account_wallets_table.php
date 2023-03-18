<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AccountWalletsTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('account_wallets');
        if ($exists) {
            $this->table('account_wallets')->drop()->save();
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
        $table = $this->table('account_wallets');
        
        $table->addColumn('wallet_id', 'integer', ['null' => false, 'signed' => true, 'comment' => 'Ключ кошелька'])
        ->addForeignKey('wallet_id', 'wallets', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
        ->addColumn('account_id', 'integer', ['null' => false, 'signed' => true, 'comment' => 'Ключ аккаунта'])
            ->addForeignKey('account_id', 'accounts', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addTimestamps()
            ->create();
    }
}
