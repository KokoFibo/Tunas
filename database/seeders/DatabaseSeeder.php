<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\Title;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Title::create([
            'name_title' => 'Bapak',
            'default' => true,

        ]);
        Title::create([
            'name_title' => 'Ibu',
            'default' => false,

        ]);
        Title::create([
            'name_title' => 'PT',
            'default' => false,

        ]);
        Title::create([
            'name_title' => 'CV',
            'default' => false,

        ]);


        \App\Models\Customer::factory(100000)->create();
    }
}
