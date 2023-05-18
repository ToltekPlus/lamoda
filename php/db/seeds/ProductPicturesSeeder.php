<?php


use Phinx\Seed\AbstractSeed;

class ProductPicturesSeeder extends AbstractSeed
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

        $pictures_ids = $this->fetchAll('SELECT id FROM pictures');


        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'product_id' => $products_ids[array_rand($products_ids, 1)]['id'],
                'picture_id' => $pictures_ids[array_rand($pictures_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $product_picture = $this->table('product_pictures');
        $product_picture->insert($data)->save();
    }
}
