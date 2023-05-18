<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class StatusesTable extends AbstractMigration
{
    public function up(): void
    {
        $exists = $this->hasTable('statuses');
        if ($exists) {
            $this->table('statuses')->drop()->save();
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
        $table = $this->table('statuses');
        
        $table->addColumn('status_code', 'integer', ['comment' => 'Код транзакции'])
        ->addColumn('status', 'string', ['comment' => 'Статус'])
            ->addTimestamps()
            ->create();
    }
}