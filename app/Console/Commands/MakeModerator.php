<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MakeModerator extends Command
{
    protected $signature = 'user:make-moderator {id}';
    protected $description = 'Command description';

    public function handle()
    {
        $user = User::find($this->argument('id'));

        if (!$user) {
            $this->error('Пользователь не найден');
        }

        if ($user->role === 'moderator')
        {
            $this->error('Пользователь является moderator');
        }

        $user->role = User::ROLE_MODERATOR;
        $user->save();

        Log::info("Пользователь #{$user->id} теперь moderator");
    }
}
