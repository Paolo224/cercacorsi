<?php

namespace App\Console\Commands;

use App\Mail\UserInactive as MailUserInactive;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UserInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Carbon::parse($user->last_login)->diffInDays(Carbon::now()) == 30) {

                Mail::to($user)->send(new MailUserInactive($user));
            }
        }

        return 0;
    }
}
