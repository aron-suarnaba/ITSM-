<?php

namespace App\Http\Controllers;

use App\Events\RequestStatusUpdated;
use Illuminate\Http\Request;
use App\Models\Requests;
use Illuminate\Support\Str;


class RequestController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->employee_id;

        $requests = Requests::select()
            ->where('requested_by_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('request', compact('requests'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'reqCatSel' => 'required|string|max:255',
            'reqDetSel' => 'nullable|string',
            'reqTypeSel' => 'required|string|max:255',
            'needed_date' => 'required|date',
            'detailed_desc' => 'required|string',
        ]);

        $reviewKey = (string) Str::uuid();

        $dataToSave = [
            'requested_by_id' => auth()->user()->employee_id,
            'needed_date' => $validatedData['needed_date'],
            'requested_cat' => $validatedData['reqCatSel'],
            'requested_details' => $validatedData['reqDetSel'] ?? null,
            'request_type' => $validatedData['reqTypeSel'],
            'detailed_description' => $validatedData['detailed_desc'],
            'status' => 'For Review',
            'review_key' => $reviewKey,
        ];


        $createdRequest = Requests::create($dataToSave);

        event(new RequestStatusUpdated($createdRequest));

        return redirect()->route('request')
            ->with('success', 'Request submitted successfully!');

    }
}
