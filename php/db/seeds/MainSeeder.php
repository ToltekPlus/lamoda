<?php


use Phinx\Seed\AbstractSeed;

class MainSeeder extends AbstractSeed
{
    // TODO realization load seed
    /*
    protected $seedClasses = [
        UserSeeder::class,
        AccountSeeder::class,
        AccountUserSeeder::class
    ];*/

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
        /*
        foreach ($this->seedClasses as $seedClass) {
            $seeder = new $seedClass;
            $seeder->setAdapter($this->getAdapter());
            $seeder->run();
        }*/
    }
}
