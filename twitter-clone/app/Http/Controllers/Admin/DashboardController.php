<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    public function index(){
        // if (!auth()->user()->is_admin){
        //     abort(403);
        // }
        Log::info('Inside admin Dashboard');
        return view('admin.dashboard');
    }
}
