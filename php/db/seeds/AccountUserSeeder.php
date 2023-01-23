<?php


use Phinx\Seed\AbstractSeed;

class AccountUserSeeder extends AbstractSeed
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
        // TODO refactoring
        $foreignKeysUsers = $this->adapter->fetchAll("SELECT * FROM users");
        $foreignKeysAccounts = $this->adapter->fetchAll("SELECT * FROM accounts");

        $data = [
            [
                'user_id' => $foreignKeysUsers[0]['id'],
                'account_id' => $foreignKeysAccounts[0]['id'],
            ],
            [
                'user_id' => $foreignKeysUsers[1]['id'],
                'account_id' => $foreignKeysAccounts[1]['id'],
            ]
        ];

        $account = $this->table('accounts_user');
        $account->insert($data)->save();
    }
}
