<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FavoriteProductsTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('favorite_products');
        if ($exists) {
            $this->table('favorite_products')->drop()->save();
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
        $table = $this->table('favorite_products');
        
        $table->addColumn('user_account_id', 'integer', ['comment' => 'Ключ аккаунта пользователя'])
            ->addForeignKey('user_account_id', 'users_account', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('product_id', 'integer', ['comment' => 'Ключ продукта'])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addTimestamps()
            ->create();
    }
}
