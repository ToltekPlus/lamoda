<?php


use Phinx\Seed\AbstractSeed;

class MainSeeder extends AbstractSeed
{
     // TODO realization load seed

    protected $seedClasses = [
        MaterialSeeder::class,
        CompanySeeder::class,
        DesignSeeder::class,
        ColorSeeder::class,
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
        AccountsUserSeeder::class,
        AccountWalletsSeeder::class,
        SubcategorySeeder::class,
        DesignColorsSeeder::class,
        ProductSeeder::class,
        ProductPicturesSeeder::class,
        ProductSizeSeeder::class,
        OrderSeeder::class,
        DepositMoneySeeder::class,
        FavoriteProductsSeeder::class
    ];

    public function run(): void
    {
        foreach ($this->seedClasses as $seedClass) {
            $seeder = new $seedClass;
            $seeder->setAdapter($this->getAdapter());
            $seeder->run();
        }
    }
}
