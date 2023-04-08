<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
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
        
        $faker = Faker\Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'phone' => $faker->phoneNumber(),
                'password' => md5($faker->password()),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]) ;
        }

        $user = $this->table('users');
        $user->insert($data)->save();
    }
}