<?php

use Illuminate\Database\Seeder;
use App\HotelCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HotelCategory::create(['name'=>'хотел']);

        HotelCategory::create(['name'=>'сем.хотел']);

        HotelCategory::create(['name'=>'къща']);

        HotelCategory::create(['name'=>'апартамент']);

        HotelCategory::create(['name'=>'бунгало']);

        HotelCategory::create(['name'=>'квартира']);

        HotelCategory::create(['name'=>'къмпинг']);

    }
}
