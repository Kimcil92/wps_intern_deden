<?php

namespace App\Services;

use App\Models\DailyTask;
use App\Models\UserSuperior;
use Illuminate\Support\Facades\Auth;

class ApproveService
{
    public function getVerifications()
    {
        $superior = UserSuperior::where('superior_id', Auth::id())->first();

        if ($superior) {
            return DailyTask::where('user_superior_id', $superior->id)->get();
        }

        return collect(); // Return empty collection if no superior found
    }

    public function approveVerification($id)
    {
        $verification = DailyTask::findOrFail($id);
        $verification->status = 'approve';
        $verification->save();
    }

    public function declineVerification($id)
    {
        $verification = DailyTask::findOrFail($id);
        $verification->status = 'declined';
        $verification->save();
    }

    public function deleteVerification($id)
    {
        $verification = DailyTask::findOrFail($id);
        $verification->delete();
    }
}
