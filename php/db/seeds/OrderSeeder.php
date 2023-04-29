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

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                /*$account_wallet_id = array_rand([1,2]),
                $product_id = array_rand([1,2]),
                $status_id = array_rand([1,2]),*/
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
