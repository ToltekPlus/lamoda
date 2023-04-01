<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ProductPicturesTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('product_pictures');
        if ($exists) {
            $this->table('product_pictures')->drop()->save();
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
        $table = $this->table('product_pictures');
        
        $table->addColumn('picture_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ картинки'])
            ->addForeignKey('picture_id', 'pictures', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('product_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ продукта'])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addTimestamps()
            ->create();
    }
}
