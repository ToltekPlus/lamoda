<?php


use Phinx\Seed\AbstractSeed;

class AccountWalletsSeeder extends AbstractSeed
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

        $wallets_ids = $this->fetchAll('SELECT id FROM accounts');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'account_id' => $accounts_ids[array_rand($accounts_ids, 1)]['id'],
                'wallet_id' => $wallets_ids[array_rand($wallets_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $account_wallet = $this->table('account_wallets');
        $account_wallet->insert($data)->save();
    }
}
