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
                'gender_id' => $genders_ids[array_rand($genders_ids, 1)]['id'],
                'subcategory_id' => $subcategories_ids[array_rand($subcategories_ids, 1)]['id'],
                'material_id' => $materials_ids[array_rand($materials_ids, 1)]['id'],
                'company_id' => $companies_ids[array_rand($companies_ids, 1)]['id'],
                'style_id' => $styles_ids[array_rand($styles_ids, 1)]['id'],
                'design_color_id' => $design_colors_ids[array_rand($design_colors_ids, 1)]['id'],
                'description' => $faker->word(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]) ;
        }

        $product = $this->table('products');
        $product->insert($data)->save();
    }
}
