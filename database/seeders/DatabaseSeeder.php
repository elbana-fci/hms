<?php

namespace Database\Seeders;

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
        
        \App\Models\User::factory(2)->create()->each(function($e) {
            $e->employees()
                ->saveMany(\App\Models\Employee::factory(rand(1, 5))->make()
            )->each(function ($q){
                $q->penalties()->saveMany(\App\Models\Penalty::factory(rand(1, 5))->make());
            });
        });
    }
}
