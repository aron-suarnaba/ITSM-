<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Events\RequestStatusUpdated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TicketGenerator;
use App\Models\Approval;
use App\Models\Requests;

class ApprovalController extends Controller
{
    public function index()
    {

        $users = DB::select('EXEC get_request_per_department');

        foreach ($users as $user) {

            if (isset($user->needed_date)) {
                $user->needed_date = Carbon::parse($user->needed_date);
            }

            if (isset($user->created_at)) {
                $user->created_at = Carbon::parse($user->created_at);
            }

        }

        return view('it-manager-approval', compact('users'));
    }

    // App\Http\Controllers/ApprovalController.php

   // App\Http\Controllers/ApprovalController.php

public function approve(Request $request)
{
    $myId = auth()->user()->employee_id;

    $reviewKey = $request->input('review_key');
    $requestCategory = $request->input('request_category');



    $approveLogData = [
        'status' => RequestStatus::FOR_CHECKING->value,
        'review_key' => $reviewKey,
        'ticket_number' => TicketGenerator::generateTicketNumber($requestCategory),
        'approved_by_id' => $myId,
    ];

    Approval::create($approveLogData);

    // --- Phase 4: Redirect ---
    return redirect()->route('approval.index')
        ->with('success', 'Request approved and submitted for checking successfully!');
}


}
