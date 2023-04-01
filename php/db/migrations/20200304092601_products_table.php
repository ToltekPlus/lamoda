<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ProductsTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('products');
        if ($exists) {
            $this->table('products')->drop()->save();
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
        $table = $this->table('products');
        
        $table->addColumn('style_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ стиля'])
        ->addForeignKey('style_id', 'styles', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
        ->addColumn('company_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ компании'])
        ->addForeignKey('company_id', 'companies', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
        ->addColumn('material_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ материала'])
        ->addForeignKey('material_id', 'materials', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('design_color_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ цвета узора'])
            ->addForeignKey('design_color_id', 'design_colors', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('gender_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ гендера'])
            ->addForeignKey('gender_id', 'genders', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('subcategory_id', 'integer', ['null' => true, 'signed' => false, 'comment' => 'Ключ подкатегории'])
            ->addForeignKey('subcategory_id', 'subcategories', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('description', 'string', ['comment' => 'Описание'])
            ->addTimestamps()
            ->create();
    }
}
