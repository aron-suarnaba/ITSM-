<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;

class RequestController extends Controller
{
    public function index()
    {
        $auth_user = auth()->user()->employee_id;

        $requests = Tickets::select()
            ->where('requested_by_id', $auth_user)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('request', compact('requests'));
    }
}
