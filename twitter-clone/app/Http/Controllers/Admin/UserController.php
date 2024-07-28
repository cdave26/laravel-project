<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::latest()->paginate(8);

        return view('admin.users.index', compact('users'));
    }

  public function makeAdminUser(User $user){
      $user->update(['is_admin' => 1]);
      return redirect()->route('admin.users.index'); // Use redirect instead of view
  }


}

