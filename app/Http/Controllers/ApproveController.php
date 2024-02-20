<?php

namespace App\Http\Controllers;

use App\Services\ApproveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
{
    private $verificationService;

    public function __construct(ApproveService $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    public function index()
    {
        $verifications = $this->verificationService->getVerifications();
//        dd($verifications);
        return view('dashboard.approve', compact('verifications'));
    }

    public function approve($id)
    {
        $this->verificationService->approveVerification($id);
        return redirect()->route('approve')->with('success', 'Verification approved successfully.');
    }

    public function decline($id)
    {
        $this->verificationService->declineVerification($id);
        return redirect()->route('approve')->with('success', 'Verification declined successfully.');
    }

    public function delete($id)
    {
        $this->verificationService->deleteVerification($id);
        return redirect()->route('approve')->with('success', 'Verification deleted successfully.');
    }
}
