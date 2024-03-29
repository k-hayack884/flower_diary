<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
//        $this->call(UserSeeder::class);
        $this->call(PlantSeeder::class);
//        $this->call(PlantUnitSeeder::class);
//        $this->call(DiarySeeder::class);
//        $this->call(CommentSeeder::class);
//        $this->call(CheckSeatSeeder::class);
//        $this->call(WaterSettingSeeder::class);
//        $this->call(FertilizerSettingSeeder::class);
//        $this->call(WaterAlertTimeSeeder::class);
//        $this->call(FertilizerAlertTimeSeeder::class);
        $this->call(PlantImageSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
