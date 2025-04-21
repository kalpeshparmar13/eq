<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyQuotaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainClass;
use Carbon\Carbon;

class EmergencyQuotaApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eqrequests = EmergencyQuotaRequest::where('status', 'FORWARDED')
                                                ->where('forwarded_to', Auth::id())
                                                ->orwhere('created_by', Auth::id())
                                                ->whereBetween('created_at', [now()->subMonths(1)->startOfDay(), now()->endOfDay()])
                                                ->orderByDesc('created_at')
                                                ->get();
        return view('eqapprove.index', compact('eqrequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eqrequest = EmergencyQuotaRequest::find($id);
        $trainClasses = TrainClass::all(); 
        $users = User::where('role', 'like', 'approving_officer')->get(['id', 'name']);
        return view('eqapprove.show', compact('users'), compact('eqrequest'), compact('trainClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(Request $request)
    {
        // Find the emergency quota request by id
        $eqrequest = EmergencyQuotaRequest::findOrFail($request->input('id'));

        $last_diary_no = EmergencyQuotaRequest::where('status_approval', 'APPROVED')
                                                ->where('diary_year', now()->year)
                                                ->where('forwarded_to',$eqrequest->forwardedTo->id)
                                                ->max('diary_no');
        
        $nextdiaryNo = $last_diary_no ? $last_diary_no + 1 : 1;

        
        $eqrequest->status_approval = 'APPROVED';
        $eqrequest->status_approval_dt = now();
        $eqrequest->diary_no = $nextdiaryNo;
        $eqrequest->diary_year = now()->year;
        $eqrequest->diary_no_full =  $eqrequest->forwardedTo->diary_name . '/' . now()->year. '/' . $nextdiaryNo;
                
        $eqrequest->save();

        // Redirect back with a success message
        return redirect()->route('eqapprove.index') // or wherever you want to redirect
            ->with('success', 'Emergency Quota Request Approved Successfully!');
    }
}
