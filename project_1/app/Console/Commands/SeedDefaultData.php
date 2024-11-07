<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeedDefaultData extends Command
{
    protected $signature = 'db:seed-default';
    protected $description = 'Seed default categories and events';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $categories = [
            ['id' => 1, 'name' => 'Category 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Category 2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Category 3', 'created_at' => now(), 'updated_at' => now()],
        ];

        $events = [
            [
                'id' => 1,
                'title' => 'Event 1',
                'description' => 'Event 1 description',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(1),
                'category_name' => 'Category 1',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'Event 2',
                'description' => 'Event 2 description',
                'start_date' => Carbon::now()->addDays(2),
                'end_date' => Carbon::now()->addDays(3),
                'category_name' => 'Category 2',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => 'Event 3',
                'description' => 'Event 3 description',
                'start_date' => Carbon::now()->addDays(4),
                'end_date' => Carbon::now()->addDays(5),
                'category_name' => 'Category 3',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('categories')->insertOrIgnore($categories);
        DB::table('events')->insertOrIgnore($events);

        $this->info('Default categories and events seeded successfully.');
    }
}
