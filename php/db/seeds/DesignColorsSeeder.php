<?php


use Phinx\Seed\AbstractSeed;

class DesignColorsSeeder extends AbstractSeed
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

        $colors_ids = $this->fetchAll('SELECT id FROM colors');

        $designes_ids = $this->fetchAll('SELECT id FROM designes');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'color_id' => $colors_ids[array_rand($colors_ids, 1)]['id'],
                'design_id' => $designes_ids[array_rand($designes_ids, 1)]['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $design_color = $this->table('design_colors');
        $design_color->insert($data)->save();
    }
}
