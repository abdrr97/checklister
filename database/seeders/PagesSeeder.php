<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'welcome', 'content' => 'Welcome']);
        Page::create(['title' => 'Get Consultation', 'content' => 'Get Consultation']);
    }
}
