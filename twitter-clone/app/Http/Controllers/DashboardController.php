<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){

        $users = [
            [
            'name' => 'Dave',
            'age' => '25'
            ],
            [
            'name' => 'richelle',
            'age' => '25'   
            ],
            [
            'name' => 'lloyd',
            'age' => '17'   
            ]


        ];

        return view('dashboard', ['users' => $users ]);

    }

}
