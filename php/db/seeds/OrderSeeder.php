<?php


use Phinx\Seed\AbstractSeed;

class OrderSeeder extends AbstractSeed
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

        $products_ids = $this->fetchAll('SELECT id FROM products');

        $account_wallets_ids = $this->fetchAll('SELECT id FROM account_wallets');

        $statuses_ids = $this->fetchAll('SELECT id FROM statuses');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'account_wallets_id' => array_rand($account_wallets_ids, 1),
                'products_id' => array_rand($products_ids, 1),
                'statuses_id' => array_rand($statuses_ids, 1),
                'buy_time' => date('Y-m-d H:i:s'),
                'receive_time' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $order = $this->table('orders');
        $order->insert($data)->save();   
    }
}
