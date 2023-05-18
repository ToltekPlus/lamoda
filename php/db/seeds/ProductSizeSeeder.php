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
                'product_id' => $products_ids[array_rand($products_ids, 1)]['id'],
                'size_id' => $sizes_ids[array_rand($sizes_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $product_size = $this->table('product_sizes');
        $product_size->insert($data)->save();
    }
}
