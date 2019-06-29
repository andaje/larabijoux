<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['roles','countries','cities', 'addresses', 'users', 'categories', 'products', 'orders', 'photos'];
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->toTruncate as $table) {
            Db::table('roles')->truncate();
            Db::table('countries')->truncate();
            Db::table('cities')->truncate();
            Db::table('addresses')->truncate();
            Db::table('users')->truncate();
            Db::table('categories')->truncate();
            Db::table('products')->truncate();
            Db::table('photos')->truncate();


    }
        $this->call(RolesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}

