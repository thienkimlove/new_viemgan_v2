<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class AddAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:admin {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->option('email');
        if ($email) {
            $this->line('Create Admin with email='.$email);

            if (User::where('email', $email)->count() > 0) {
                $this->line('This email='.$email. ' existed in database!');
            } else {
                User::create([
                    'email' => $email,
                    'name' => $email,
                    'password' => Hash::make(uniqid())
                ]);
                $this->line('Done');
            }
        }
    }
}
