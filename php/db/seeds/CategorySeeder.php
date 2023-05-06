<?php


use Phinx\Seed\AbstractSeed;

class CategorySeeder extends AbstractSeed
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

        $subcategories_ids = $this->fetchAll('SELECT id FROM subcategories');

        for ($i = 0; $i < 50; $i++) {
            $subcategory_id = array_rand([1,2]);
            array_push($data, [
                'subcategories_id' => array_rand($subcategories_ids, 1),
                'category' => $faker->word(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $category = $this->table('categories');
        $category->insert($data)->save();
    }
}
