<?php

namespace App\Http\Controllers;

use App\Services\ApproveService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    private $verificationService;

    public function __construct(ApproveService $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    public function events()
    {
        $tasks = $this->verificationService->getVerifications();

        $events = [];

        foreach ($tasks as $dailyTask) {
            $start_date = new \DateTime($dailyTask->start_date);
            $end_date = new \DateTime($dailyTask->end_date);
            $color = $this->getStatusColor($dailyTask->status);

            $events[] = [
                'title' => $dailyTask->name,
                'start' => $start_date->format('Y-m-d'),
                'end' => $end_date->format('Y-m-d'),
                'color' => $color,
            ];
        }
        return view('dashboard.dashboard', compact('events'));
    }

    private function getStatusColor($status)
    {
        switch ($status) {
            case 'pending':
                return 'blue'; // Warna biru untuk status pending
            case 'approve':
                return 'green'; // Warna hijau untuk status approved
            case 'declined':
                return 'red'; // Warna merah untuk status declined
            default:
                return 'gray'; // Warna default jika status tidak dikenali
        }
    }
}
