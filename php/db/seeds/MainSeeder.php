<?php


use Phinx\Seed\AbstractSeed;

class MainSeeder extends AbstractSeed
{
    protected $seedClasses = [
        UserSeeder::class,
        AccountSeeder::class,
        AccountUserSeeder::class
    ];

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        foreach ($this->seedClasses as $seedClass) {
            $seeder = new $seedClass;
            $seeder->setAdapter($this->getAdapter()); // this is required to set the database connection
            $seeder->run();
        }
    }
}
