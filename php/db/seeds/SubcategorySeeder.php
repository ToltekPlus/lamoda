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

        for ($i = 0; $i < 50; $i++) {
            $category_id = array_rand([1,2]);
            array_push($data, [
                'subcategory' => $faker->word(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]) ;
        }

        $subcategory = $this->table('usubcategories');
        $subcategory->insert($data)->save();
    }
}
