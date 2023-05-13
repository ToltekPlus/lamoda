<?php

use Phinx\Seed\AbstractSeed;

class DepositMoneySeeder extends AbstractSeed
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

        $account_wallets_ids = $this->fetchAll('SELECT id FROM account_wallets');

        $banks_ids = $this->fetchAll('SELECT id FROM banks');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'bank_id' => $banks_ids[array_rand($banks_ids, 1)]['id'],
                'account_wallet_id' => $account_wallets_ids[array_rand($account_wallets_ids, 1)]['id'],
                'value_money' => $faker->numberBetween(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $deposit_money = $this->table('deposit_money');
        $deposit_money->insert($data)->save(); 
    }
}
