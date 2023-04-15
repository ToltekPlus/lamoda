<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
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
            $gender_id = array_rand([1,2]);
            $subcategory_id = array_rand([1,2]);
            $material_id = array_rand([1,2]);
            $company_id = array_rand([1,2]);
            $style_id = array_rand([1,2]);
            $design_color_id = array_rand([1,2]);
            array_push($data, [
                'description' => $faker->word(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]) ;
        }

        $product = $this->table('products');
        $product->insert($data)->save();
    }
}
