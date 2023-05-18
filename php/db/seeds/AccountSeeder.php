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
        $data = [
            [
                'name' => '',
                'second_name' => '',
                'patronymic' => '',
                'userpic' => '/userpic/userpic.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => '',
                'second_name' => '',
                'patronymic' => '',
                'userpic' => '/userpic/userpic.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $account = $this->table('accounts');
        $account->insert($data)->save();
    }
}
