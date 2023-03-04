<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class OrderTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('orders');
        if ($exists) {
            $this->table('orders')->drop()->save();
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
        $table = $this->table('orders');
        
        $table->addColumn('account_wallet_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ аккаунта кошелька'])
        ->addForeignKey('account_wallet_id', 'account_wallets', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
        ->addColumn('status_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ статуса'])
        ->addForeignKey('status_id', 'statuses', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('value_money', 'float', ['comment' => 'Деньги на счёте'])
            ->addColumn('product_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ продукта'])
        ->addForeignKey('product_id', 'products', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
        ->addColumn('buy_time', 'datetime', ['comment' => 'Время покупки'])
        ->addColumn('receive_time', 'datetime', ['comment' => 'Время получения'])
            ->addTimestamps()
            ->create();
    }
}
