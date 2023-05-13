<?php


use Phinx\Seed\AbstractSeed;

class ProductSizeSeeder extends AbstractSeed
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

        $sizes_ids = $this->fetchAll('SELECT id FROM sizes');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'products_id' => array_rand($products_ids, 1),
                'sizes_id' => array_rand($sizes_ids, 1),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $product_size = $this->table('product_sizes');
        $product_size->insert($data)->save();
    }
}
