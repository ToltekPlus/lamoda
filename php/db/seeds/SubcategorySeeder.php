<?php


use Phinx\Seed\AbstractSeed;

class SubcategorySeeder extends AbstractSeed
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

        $categories_ids = $this->fetchAll('SELECT id FROM categories');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'category_id' => $categories_ids[array_rand($categories_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]) ;
        }

        $subcategory = $this->table('subcategories');
        $subcategory->insert($data)->save();
    }
}
