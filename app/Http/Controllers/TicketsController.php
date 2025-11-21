<?php

namespace App\Http\Controllers;

use App\Models\TicketGenerator;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function submit(Request $request)
    {

        $validatedData = $request->validate([
            'reqCatSel' => 'required|string|max:255',
            'reqDetSel' => 'nullable|string',   // <-- correct
            'reqTypeSel' => 'required|string|max:255',
            'needed_date' => 'required|date',
            'detailed_desc' => 'required|string',
        ]);



        $dataToSave = [
            'requested_by_id'     => auth()->user()->employee_id,
            'requested_date'      => now(),
            'needed_date'         => $validatedData['needed_date'],
            'requested_cat'       => $validatedData['reqCatSel'],
            'requested_details'   => $validatedData['reqDetSel'] ?? null,
            'request_type'        => $validatedData['reqTypeSel'],
            'detailed_description'=> $validatedData['detailed_desc'],
            'status'              => 'For Review',
        ];


        $ticket = Tickets::create($dataToSave);

        return redirect()->route('home')
            ->with('success', 'Ticket submitted successfully!');

    }

    public function review(Request $request)
    {

    }

    public function approval(Request $request)
    {

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
