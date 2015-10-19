<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

require_once(dirname(__FILE__) .'/UserTableSeeder.php');
require_once(dirname(__FILE__) .'/ShopTableSeeder.php');
require_once(dirname(__FILE__) .'/ShopUserTableSeeder.php');

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(ShopUserTableSeeder::class);

        Model::reguard();
    }
}
