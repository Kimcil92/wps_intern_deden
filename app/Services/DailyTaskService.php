<?php

namespace App\Services;

use App\Models\DailyTask;
use App\Models\User;
use App\Models\UserSuperior;
use Illuminate\Support\Facades\Auth;

class DailyTaskService
{
    public function getDailyTasksForUser($userId)
    {
        return DailyTask::where('user_id', $userId)->get();
    }

    public function getSuperiorName($userSuperiorId)
    {
        $userSuperior = UserSuperior::find($userSuperiorId);
        if ($userSuperior) {
            $superior = User::find($userSuperior->superior_id);
            if ($superior) {
                return $superior->name;
            }
        }
        return null;
    }

    public function createDailyTask($data)
    {
        // Mendapatkan ID user yang sedang login
        $user_id = Auth::id();

        // Mendapatkan ID atasan langsung dari user yang sedang login
        $user = UserSuperior::where('user_id', $user_id)->first();
        $user_superior_id = $user->id;

        // Menambahkan user_id dan user_superior_id ke dalam data yang akan disimpan
        $data['user_id'] = $user_id;
        $data['user_superior_id'] = $user_superior_id;

        return DailyTask::create($data);
    }

    public function updateDailyTask(DailyTask $dailyTask, $data)
    {
        $dailyTask->update($data);
        return $dailyTask;
    }
}
