<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Services\DailyTaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyTaskController extends Controller
{
    private $dailyTaskService;

    public function __construct(DailyTaskService $dailyTaskService)
    {
        $this->dailyTaskService = $dailyTaskService;
    }

    public function index()
    {
        $daily_tasks = $this->dailyTaskService->getDailyTasksForUser(Auth::id());
        $daily_tasks = $daily_tasks->map(function ($daily_task) {
            $daily_task->superior_name = $this->dailyTaskService->getSuperiorName($daily_task->user_superior_id);
            return $daily_task;
        });
        return view('dashboard.daily', compact('daily_tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $this->dailyTaskService->createDailyTask($request->all());

        return redirect()->route('daily')->with('success', 'Daily task created successfully.');
    }


    public function update(Request $request, DailyTask $daily_task)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $this->dailyTaskService->updateDailyTask($daily_task, $request->all());

        return redirect()->route('daily')->with('success', 'Daily task updated successfully.');
    }

    public function destroy($daily)
    {
        $data = DailyTask::find($daily);
        if(!$data){
            return response()->json(['message' => 'Daily task not found.'], 404);
        }
        $data->delete();
        return redirect()->route('daily')->with('success', 'Daily task deleted successfully.');
    }

}
