<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function usersRequestedTable()
    {
        $myId = auth()->user()->employee_id;

        $requests = DB::select('EXEC get_request_per_department ?', [$myId]);

        foreach($requests as $request){

            if(isset($request->needed_date)){
                $request->needed_date = Carbon::parse($request->needed_date);
            }

            if(isset($request->created_at)){
                $request->created_at = Carbon::parse($request->created_at);
            }

        }

        return view('review', compact( 'requests'));
    }
}
