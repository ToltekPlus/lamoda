<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DepositMoneyTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('deposit_money');
        if ($exists) {
            $this->table('deposit_money')->drop()->save();
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
        $table = $this->table('deposit_money');
        
        $table->addColumn('account_wallet_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ аккаунта кошелька'])
        ->addForeignKey('account_wallet_id', 'account_wallets', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
        ->addColumn('bank_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ банка'])
            ->addForeignKey('bank_id', 'banks', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('value_money', 'float', ['comment' => 'Деньги на счёте'])
            ->addTimestamps()
            ->create();
    }
}
