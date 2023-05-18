<?php


use Phinx\Seed\AbstractSeed;

class AccountsUserSeeder extends AbstractSeed
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

        $accounts_ids = $this->fetchAll('SELECT id FROM accounts');

        $users_ids = $this->fetchAll('SELECT id FROM users');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'account_id' => $accounts_ids[array_rand($accounts_ids, 1)]['id'],
                'user_id' => $users_ids[array_rand($users_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $account_user = $this->table('accounts_user');
        $account_user->insert($data)->save();
    }
}
