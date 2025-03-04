<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyQuotaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainClass;

class EmergencyQuotaApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eqrequests = EmergencyQuotaRequest::where('status', 'FORWARDED')
                                                ->orderByDesc('created_dt')
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
        $eqrequest->status = 'APPROVED';
        
        $eqrequest->save();

        // Redirect back with a success message
        return redirect()->route('eqapprove.index') // or wherever you want to redirect
            ->with('success', 'Emergency Quota Request Approved Successfully!');
    }
}
