<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MakeUser extends Command
{
    protected $signature = 'user:make-user {id}';
    protected $description = 'Command description';

    public function handle()
    {
        $user = User::find($this->argument('id'));

        if (!$user) {
            $this->error('Пользователь не найден');
        }

        if ($user->role === 'user')
        {
            $this->error('Пользователь является user');
        }

        $user->role = User::ROLE_USER;
        $user->save();

        Log::info("Пользователь #{$user->id} теперь user");
    }
}
