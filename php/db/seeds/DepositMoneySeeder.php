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

        for ($i = 0; $i < 50; $i++) {
            $wallet_id = array_rand([1,2]);
            $bank_id = array_rand([1,2]);
            array_push($data, [
                'value_money' => $faker->numberBetween(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $deposit_money = $this->table('deposit_money');
        $deposit_money->insert($data)->save(); 
    }
}
