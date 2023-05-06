<?php


use Phinx\Seed\AbstractSeed;

class MainSeeder extends AbstractSeed
{
    // TODO realization load seed
    
    protected $seedClasses = [
        CompanySeeder::class,
        DesignSeeder::class,
        ColorSeeder::class,
        MateriallSeeder::class,
        StyleSeeder::class,
        SizeSeeder::class,
        CategorySeeder::class,
        PictureSeeder::class,
        StatusSeeder::class,
        BankSeeder::class,
        WalletSeeder::class,
        RoleSeeder::class,
        UserSeeder::class,
        GenderSeeder::class,
        UserRoleSeeder::class,
        AccountSeeder::class,
        AccountUserSeeder::class,
        AccountWalletSeeder::class,
        SubcategorySeeder::class,
        DesignColorSeeder::class,
        ProductSeeder::class,
        ProductPicturesSeeder::class,
        ProductSizeSeeder::class,
        OrderSeeder::class,
        DepositMoneySeeder::class,
        FavoriteProductsSeeder::class
    ];

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
        
        foreach ($this->seedClasses as $seedClass) {
            $seeder = new $seedClass;
            $seeder->setAdapter($this->getAdapter());
            $seeder->run();
        }
    }
}
