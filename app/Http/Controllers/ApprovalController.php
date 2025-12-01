<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    public function usersApprovableTable()
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
}
