<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ColorsTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('colors');
        if ($exists) {
            $this->table('colors')->drop()->save();
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
        $table = $this->table('colors');
        
        $table->addColumn('color', 'string', ['comment' => 'Название цвета'])
            ->addTimestamps()
            ->create();
    }
}