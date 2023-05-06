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

        $genders_ids = $this->fetchAll('SELECT id FROM genders');
        $subcategories_ids = $this->fetchAll('SELECT id FROM subcategories');
        $materials_ids = $this->fetchAll('SELECT id FROM materials');
        $companies_ids = $this->fetchAll('SELECT id FROM companies');
        $styles_ids = $this->fetchAll('SELECT id FROM styles');
        $design_colors_ids = $this->fetchAll('SELECT id FROM design_colors');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'genders_id' => array_rand($genders_ids, 1),
                'subcategories_id' => array_rand($subcategories_ids, 1),
                'materials_id' => array_rand($materials_ids, 1),
                'companies_id' => array_rand($companies_ids, 1),
                'styles_id' => array_rand($styles_ids, 1),
                'design_colors_id' => array_rand($design_colors_ids, 1),
                'description' => $faker->word(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]) ;
        }

        $product = $this->table('products');
        $product->insert($data)->save();
    }
}
