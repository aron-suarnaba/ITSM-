<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TicketGenerator;
use App\Models\Tickets;

class ApprovalController extends Controller
{
    public function index()
    {

        $users = DB::select('EXEC get_review_per_department');

        foreach ($users as $user) {

            if (isset($user->needed_date)) {
                $user->needed_date = Carbon::parse($user->needed_date);
            }

            if (isset($user->created_at)) {
                $user->created_at = Carbon::parse($user->created_at)->format('');
            }

        }

        return view('it-manager-approval', compact('users'));
    }

    public function approve(Request $request)
    {

        $myId = auth()->user()->employee_id;

        $reviewKey = $request->input('review_key');
        $approveKey = $request->input('approve_key');

        $request = Tickets::where('review_key', $reviewKey)
            ->where('approve_key', $approveKey)
            ->first();


        if ($request) {

            $requestCategory = $request->requested_cat;

            $ticketNumber = TicketGenerator::generateTicketNumber($requestCategory);

            $request->update([
                'status' => 'Approved',
                'approved_by_id' => $myId,
                'approved_at' => now(),
                'ticket_number' => $ticketNumber,
            ]);

            return redirect()->route('approval.index')->with('success', 'Request has been successfully approved and ticket number ' . $ticketNumber . ' was assigned.');

        } else {

            return redirect()->route('approval.index')->with('error', 'Approval Failed: Ticket key number was mismatch or ticket was not found');

        }
    }


}
