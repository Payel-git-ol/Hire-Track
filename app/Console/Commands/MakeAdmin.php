<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MakeAdmin extends Command
{
    protected $signature = 'user:make-admin {id}';
    protected $description = 'Назначить пользователю роль admin';

    public function handle()
    {
        $user = User::find($this->argument('id'));

        if (!$user) {
            $this->error('Пользователь не найден');
        }

        if ($user->role === 'admin') {
            $this->error('Пользователь является admin');
        }

        $user->role = User::ROLE_ADMIN;
        $user->save();

        Log::info("Пользователь #{$user->id} теперь admin");
    }
}
