<?php

namespace App\Http\Controllers;

use App\Events\TicketsReviewDataDisplay;
use App\Models\TicketGenerator;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function submit(Request $request, Tickets $tickets)
    {

        $validatedData = $request->validate([
            'reqCatSel' => 'required|string|max:255',
            'reqDetSel' => 'nullable|string',   // <-- correct
            'reqTypeSel' => 'required|string|max:255',
            'needed_date' => 'required|date',
            'detailed_desc' => 'required|string',
        ]);

        $reviewKey = (string) Str::uuid();

        $dataToSave = [
            'requested_by_id' => auth()->user()->employee_id,
            'requested_date' => now(),
            'needed_date' => $validatedData['needed_date'],
            'requested_cat' => $validatedData['reqCatSel'],
            'requested_details' => $validatedData['reqDetSel'] ?? null,
            'request_type' => $validatedData['reqTypeSel'],
            'detailed_description' => $validatedData['detailed_desc'],
            'status' => 'For Review',
            'review_key' => $reviewKey,
        ];


        $ticket = Tickets::create($dataToSave);

        event(new TicketsReviewDataDisplay($tickets));

        return redirect()->route('request')
            ->with('success', 'Request submitted successfully!');

    }

    public function reviewApproved(Request $request)
    {
        // 1. Get the non-ID unique key from the request
        $reviewKey = $request->input('review_key');

        $approveKey = (string) Str::uuid();

        // Stop if the key is missing or invalid
        if (!$reviewKey) {
            return redirect()->route('review')->with('error', 'Missing review key.');
        }

        // 2. Define data and authenticated user ID
        $managers_id = auth()->user()->employee_id;

        $dataToUpdate = [
            'reviewed_by_id'    => $managers_id,
            'status'            => 'For Approval', // Status is set here
            'review_at'         => now(),
            'approve_key'       => $approveKey,
        ];

        try {
            // 3. Find the record using the unique key and update it
            // This method finds the first matching record and updates it directly in the database.
            $updated = Tickets::where('review_key', $reviewKey)->update($dataToUpdate);

            if ($updated === 0) {
                // No record matched the review key.
                return redirect()->route('review')->with('error', 'Request not found or already reviewed.');
            }

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Ticket update failed: ' . $e->getMessage());
            return redirect()->route('review')->with('error', 'An error occurred during review.');
        }

        // 4. Redirect with success message
        return redirect()->route('review')
            ->with('success', 'Ticket successfully reviewed for approval.');
    }


    public function reviewRejected(Request $request)
    {

        $dataToSave = [
            'status' => 'Rejected on Review',
        ];

    }

    public function approval(Request $request)
    {
        $dataToSave = [

        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $tickets)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
