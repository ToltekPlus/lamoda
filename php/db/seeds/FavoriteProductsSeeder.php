<?php


use Phinx\Seed\AbstractSeed;

class FavoriteProductsSeeder extends AbstractSeed
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

        $accounts_user_ids = $this->fetchAll('SELECT id FROM accounts_user');

        $products_ids = $this->fetchAll('SELECT id FROM products');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'accounts_user_id' => array_rand($accounts_user_ids, 1),
                'products_id' => array_rand($products_ids, 1),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $favorite_product = $this->table('favorite_products');
        $favorite_product->insert($data)->save(); 
    }
}
