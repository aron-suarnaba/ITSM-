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





    public function store(Request $request)
    {
        $reviewKey = $request->input('review_key');

        $approveKey = (string) Str::uuid();

        // Stop if the key is missing or invalid
        if (!$reviewKey) {
            return redirect()->route('review')->with('error', 'Missing review key.');
        }

        // 2. Define data and authenticated user ID
        $managers_id = auth()->user()->employee_id;

        $dataToUpdate = [
            'reviewed_by_id' => $managers_id,
            'status' => 'For Approval', // Status is set here
            'review_at' => now(),
            'approve_key' => $approveKey,
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

    public function reject(Request $request)
    {
        $reviewKey = $request->input('review_key');
        $managers_id = auth()->user()->employee_id;

        if (!$reviewKey) {
            return redirect()->route('review')->with('error', 'Missing review key for rejection.');
        }

        $updated = Tickets::where('review_key', $reviewKey)->update([
            'status' => 'Rejected on Review',
            'reviewed_by_id' => $managers_id,
            'review_at' => now(),
        ]);

        if ($updated === 0) {
            return redirect()->route('review')->with('error', 'Request not found or already processed.');
        }

        return redirect()->route('review')
            ->with('success', 'Request successfully rejected.');
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
