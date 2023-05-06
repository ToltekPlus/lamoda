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

        $wallets_ids = $this->fetchAll('SELECT id FROM accounts');

        $banks_ids = $this->fetchAll('SELECT id FROM banks');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'banks_id' => array_rand($banks_ids, 1),
                'wallets_id' => array_rand($wallets_ids, 1),
                'value_money' => $faker->numberBetween(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $deposit_money = $this->table('deposit_money');
        $deposit_money->insert($data)->save(); 
    }
}
