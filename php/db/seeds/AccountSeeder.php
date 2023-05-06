<?php


use Phinx\Seed\AbstractSeed;

class AccountSeeder extends AbstractSeed
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

        $user_role_ids = $this->fetchAll('SELECT id FROM user_role');
        
        $genders_ids = $this->fetchAll('SELECT id FROM genders');

        for ($i = 0; $i < 50; $i++) {
            array_push($data, [
                'name' => $faker->firstName(),
                'second_name' => $faker->lastName(),
                'patronymic' => $faker->word(15),
                'user_role_id' => array_rand($user_role_ids, 1),
                'gender_id' => array_rand($genders_ids, 1),
                'userpic' => '/userpic/userpic.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $account = $this->table('accounts');
        $account->insert($data)->save();
    }
}
