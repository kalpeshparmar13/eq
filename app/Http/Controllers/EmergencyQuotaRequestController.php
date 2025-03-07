<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyQuotaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainClass;

class EmergencyQuotaRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eqrequests = EmergencyQuotaRequest::where('created_by', Auth::id())
                                                ->orderByDesc('created_dt')
                                                ->get();
        return view('eqrequest.index', compact('eqrequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all train classes from the database
        $trainClasses = TrainClass::all(); 
        $users = User::where('role', 'like', '%')->get(['id', 'name']);
         // Pass the data to the view
         return view('eqrequest.create', compact('users'), compact('trainClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all(), $request->input());

        // Step 1: Validate the incoming data
        $validated = $request->validate([
            'request_of' => 'required|integer',
            'is_on_duty' => 'required',
            'pnr' => 'required|string|max:20',
            'train_no' => 'required|string|max:10',
            'train_name' => 'required|string|max:100',
            'journey_dt' => 'required|date',
            'stn_from' => 'required|string|max:50',
            'stn_from_id' => 'required|integer',
            'stn_to' => 'required|string|max:50',
            'stn_to_id' => 'required|integer',
            'no_of_births' => 'required|integer',
            'train_class' => 'required|string|max:20',
            'passenger_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
            'journey_purpose' => 'nullable|string|max:255',
            'request_by' => 'required|integer',
        ]);

        // Step 2: Create a new emergency quota request record in the database
        $requestData = new EmergencyQuotaRequest();
        $requestData->request_of = $validated['request_of'];
        $requestData->is_on_duty = $validated['is_on_duty'];
        $requestData->pnr = $validated['pnr'];
        $requestData->train_no = $validated['train_no'];
        $requestData->train_name = $validated['train_name'];
        $requestData->journey_dt = $validated['journey_dt'];
        $requestData->stn_from = $validated['stn_from_id'];
        $requestData->stn_to = $validated['stn_to_id'];
        $requestData->no_of_births = $validated['no_of_births'];
        $requestData->train_class = $validated['train_class'];
        $requestData->passenger_name = $validated['passenger_name'];
        $requestData->mobile_no = $validated['mobile_no'];
        $requestData->journey_purpose = $validated['journey_purpose'];
        $requestData->request_by = $validated['request_by'];
        $requestData->created_by = Auth::id(); // Get the authenticated user ID
        $requestData->status = "CREATED";
        
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
        $eqrequest = EmergencyQuotaRequest::find($id);
        $trainClasses = TrainClass::all(); 
        $users = User::where('role', 'like', 'approving_officer')->get(['id', 'name']);
        return view('eqrequest.show', compact('users'), compact('eqrequest'), compact('trainClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eqrequest = EmergencyQuotaRequest::with(['stationFrom:id,name,code', 'stationTo:id,name,code'])->find($id);
        //dd($eqrequest->toArray());
        $trainClasses = TrainClass::all();
        $users = User::where('role', 'like', '%')->get(['id', 'name']); 
        return view('eqrequest.edit')->with('eqrequest',$eqrequest)->with('users',$users)->with('trainClasses',$trainClasses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $data = EmergencyQuotaRequest::find($id);

        // Step 1: Validate the incoming data
        $validated = $request->validate([
            'request_of' => 'required|integer',
            'is_on_duty' => 'required',
            'pnr' => 'required|string|max:20',
            'train_no' => 'required|string|max:10',
            'train_name' => 'required|string|max:100',
            'journey_dt' => 'required|date',
            'stn_from' => 'required|string|max:50',
            'stn_from_id' => 'required|integer',
            'stn_to' => 'required|string|max:50',
            'stn_to_id' => 'required|integer',
            'no_of_births' => 'required|integer',
            'train_class' => 'required|string|max:20',
            'passenger_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
            'journey_purpose' => 'nullable|string|max:255',
            'request_by' => 'required|integer',
        ]);

        $data->request_of = $validated['request_of'];
        $data->is_on_duty = $validated['is_on_duty'];
        $data->pnr = $validated['pnr'];
        $data->train_no = $validated['train_no'];
        $data->train_name = $validated['train_name'];
        $data->journey_dt = $validated['journey_dt'];
        $data->stn_from = $validated['stn_from_id'];
        $data->stn_to = $validated['stn_to_id'];
        $data->no_of_births = $validated['no_of_births'];
        $data->train_class = $validated['train_class'];
        $data->passenger_name = $validated['passenger_name'];
        $data->mobile_no = $validated['mobile_no'];
        $data->journey_purpose = $validated['journey_purpose'];
        $data->request_by = $validated['request_by'];
        $data->created_by = Auth::id(); // Get the authenticated user ID
        
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
    
    public function forward(Request $request)
    {
        // Find the emergency quota request by id
        $eqrequest = EmergencyQuotaRequest::findOrFail($request->input('id'));

        // Validate the input data
        $request->validate([
            'forwarded_to' => 'required|int',
        ]);

        // Update the 'forwarded_to' field
        $eqrequest->forwarded_to = $request->input('forwarded_to');
        $eqrequest->status = 'FORWARDED';
        $eqrequest->forwarded_dt = now();
        
        $eqrequest->save();

        // Redirect back with a success message
        return redirect()->route('eqrequest.index') // or wherever you want to redirect
            ->with('success', 'Emergency Quota Request forwarded successfully!');
    }

    public function pullback(Request $request)
    {
        // Find the emergency quota request by id
        $eqrequest = EmergencyQuotaRequest::findOrFail($request->input('id'));

         // Update the 'forwarded_to' field
        $eqrequest->forwarded_to = null;
        $eqrequest->status = 'CREATED';
        $eqrequest->forwarded_dt = null;
        
        $eqrequest->save();

        // Redirect back with a success message
        return redirect()->route('eqrequest.index') // or wherever you want to redirect
            ->with('success', 'Emergency Quota Request Pulled back  successfully!');
    }
    public function print(string $id)
    {
        $eqrequest = EmergencyQuotaRequest::findOrFail($id);

        // $trainClasses = TrainClass::all(); 
        // $users = User::where('role', 'like', 'approving_officer')->get(['id', 'name']);
        return view('eqrequest.print', compact('eqrequest'));
    }
    
}
