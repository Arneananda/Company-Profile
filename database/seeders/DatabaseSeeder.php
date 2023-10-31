<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\Link;
use App\Models\Service;
use App\Models\custpart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'wilson',
            'password' => 'admin123'
        ]);
        custpart::factory(10)->create();
    //   User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        // ]);
        Link::create([
            'name' => 'Linkedin',
            'link' => 'https://www.linkedin.com/company/rapitechindonesia/mycompany/'
        ]);
        Link::create([
            'name' => 'Youtube',
            'link' => 'https://www.youtube.com/channel/UCDm0RwY3cE36DuXzZTHz1Zg'
        ]);
        Link::create([
            'name' => 'TikTok',
            'link' => 'https://www.tiktok.com/@rapiertechnology?is_from_webapp=1&sender_device=pc'
        ]);
        Link::create([
            'name' => 'Instagram',
            'link' => 'https://www.instagram.com/rapiertechnology/'
        ]);
        


         
    }

}
