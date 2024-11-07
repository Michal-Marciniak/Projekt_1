<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class AddAdminUser extends Command
{
    protected $signature = 'db:add-admin-user';
    protected $description = 'Add an admin user to the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'qweQWE123!@#';

        $adminUser = User::create([
            'id' => 1,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->info("Admin user created successfully");
    }
}
