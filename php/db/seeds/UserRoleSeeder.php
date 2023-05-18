<?php


use Phinx\Seed\AbstractSeed;

class UserRoleSeeder extends AbstractSeed
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

        $users_ids = $this->fetchAll('SELECT id FROM users');
        $roles_ids = $this->fetchAll('SELECT id FROM roles');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'user_id' => $users_ids[array_rand($users_ids, 1)]['id'],
                'role_id' => $roles_ids[array_rand($roles_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $user_role = $this->table('user_role');
        $user_role->insert($data)->save();
    }
}
