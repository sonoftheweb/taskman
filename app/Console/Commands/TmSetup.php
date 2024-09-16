<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TmSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tm-setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup a new user with email and password from environment variables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Run migrate:fresh to have a clean database
        $this->call('migrate:fresh');

        $email = env('TM_SETUP_EMAIL', 'admin@email.com');
        $password = env('TM_SETUP_PASSWORD', 'admin123');

        if (!$email || !$password) {
            $this->error('TM_SETUP_EMAIL and TM_SETUP_PASSWORD must be set in the environment variables.');
            return;
        }

        $user = User::create([
            'name' => 'Default User',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if ($user) {
            $this->info('User created successfully.');
        } else {
            $this->error('Failed to create user.');
        }
    }
}
