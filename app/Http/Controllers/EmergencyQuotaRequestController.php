<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyQuotaRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; 

class EmergencyQuotaRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eqrequests = EmergencyQuotaRequest::all()->sortByDesc('created_dt');
        return view('eqrequest.index', compact('eqrequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eqrequest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all(), $request->input());

        // Step 1: Validate the incoming data
        $validated = $request->validate([
            'diary_no' => 'string|max:255',
            // 'request_of' => 'required|string|max:255',
            // 'request_by' => 'required|string|max:255',
            'pnr' => 'required|string|max:20',
            'train_no' => 'required|string|max:10',
            'train_name' => 'required|string|max:100',
            'journey_dt' => 'required|date',
            'stn_from' => 'required|string|max:50',
            'stn_to' => 'required|string|max:50',
            'no_of_births' => 'required|integer',
            'class' => 'required|string|max:20',
            'passenger_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
            'journey_purpose' => 'nullable|string|max:255',
            // 'created_by' => 'required|integer', // assuming created_by is the user ID
            // 'created_dt' => 'required|date',
        ]);

        // Step 2: Create a new emergency quota request record in the database
        $requestData = new EmergencyQuotaRequest();
        $requestData->diary_no = "123";
        $requestData->request_of = Auth::id(); // Get the authenticated user ID
        $requestData->request_by = Auth::id(); // Get the authenticated user ID
        $requestData->pnr = $validated['pnr'];
        $requestData->train_no = $validated['train_no'];
        $requestData->train_name = $validated['train_name'];
        $requestData->journey_dt = $validated['journey_dt'];
        $requestData->stn_from = $validated['stn_from'];
        $requestData->stn_to = $validated['stn_to'];
        $requestData->no_of_births = $validated['no_of_births'];
        $requestData->class = $validated['class'];
        $requestData->passenger_name = $validated['passenger_name'];
        $requestData->mobile_no = $validated['mobile_no'];
        $requestData->journey_purpose = $validated['journey_purpose'];
        $requestData->created_by = Auth::id(); // Get the authenticated user ID
        $requestData->created_dt = now(); // You can set this to current timestamp or any other value

         // Step 3: Save the record in the database
        $requestData->save();

        // Step 4: Redirect or return a response
        return redirect()->route('eqrequest.index') // or wherever you want to redirect
            ->with('success', 'Emergency Quota Request saved successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eqrequest = EmergencyQuotaRequest::find($id);

        return view('eqrequest.edit', compact('eqrequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = EmergencyQuotaRequest::find($id);

        // Step 1: Validate the incoming data
        $validated = $request->validate([
            'diary_no' => 'string|max:255',
            // 'request_of' => 'required|string|max:255',
            // 'request_by' => 'required|string|max:255',
            'pnr' => 'required|string|max:20',
            'train_no' => 'required|string|max:10',
            'train_name' => 'required|string|max:100',
            'journey_dt' => 'required|date',
            'stn_from' => 'required|string|max:50',
            'stn_to' => 'required|string|max:50',
            'no_of_births' => 'required|integer',
            'class' => 'required|string|max:20',
            'passenger_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
            'journey_purpose' => 'nullable|string|max:255',
            // 'created_by' => 'required|integer', // assuming created_by is the user ID
            // 'created_dt' => 'required|date',
        ]);

        $data->diary_no = "123";
        $data->request_of = Auth::id(); // Get the authenticated user ID
        $data->request_by = Auth::id(); // Get the authenticated user ID
        $data->pnr = $validated['pnr'];
        $data->train_no = $validated['train_no'];
        $data->train_name = $validated['train_name'];
        $data->journey_dt = $validated['journey_dt'];
        $data->stn_from = $validated['stn_from'];
        $data->stn_to = $validated['stn_to'];
        $data->no_of_births = $validated['no_of_births'];
        $data->class = $validated['class'];
        $data->passenger_name = $validated['passenger_name'];
        $data->mobile_no = $validated['mobile_no'];
        $data->journey_purpose = $validated['journey_purpose'];
        $data->created_by = Auth::id(); // Get the authenticated user ID
        $data->created_dt = now(); // You can set this to current timestamp or any other value

         // Step 3: Save the record in the database
        $data->update();

        // Step 4: Redirect or return a response
        return redirect()->route('eqrequest.index') // or wherever you want to redirect
            ->with('success', 'Emergency Quota Request saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = EmergencyQuotaRequest::find($id);
        $data->delete();

        return redirect()->route('eqrequest.index')
            ->with('success', 'Emergency Quota Request deleted successfully!');
    }                                   
}
