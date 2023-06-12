<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('role_id', 2)
            ->where('status', 'active')
            ->get();
        return view('backend.user.index', compact('data'));
    }
    public function inactive()
    {
        $data = User::where('role_id', 2)
            ->where('status', 'inactive')
            ->get();
        return view('backend.user.inactive', compact('data'));
    }
    public function activate(User $user)
    {
        $user->status = 'active';
        $user->save();

        return redirect()->route('user.index')->with(['type' => 'success', 'message' => 'Account has been successfully activated.']);
    }
    public function view($id)
    {
        $data = User::find($id);
        return view('backend.user.view', compact('data'));
    }
}
