<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DesignColorTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('design_colors');
        if ($exists) {
            $this->table('design_colors')->drop()->save();
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
        $table = $this->table('design_colors');
        
        $table->addColumn('color_id', 'integer', ['comment' => 'Ключ цвета'])
            ->addForeignKey('color_id', 'colors', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addColumn('design_id', 'integer', ['comment' => 'Ключ узора'])
            ->addForeignKey('design_id', 'designes', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->addTimestamps()
            ->create();
    }
}
