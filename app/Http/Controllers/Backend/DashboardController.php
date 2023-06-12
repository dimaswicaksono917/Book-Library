<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookcount = Book::count();
        $categorycount = Category::count();
        $usercount = User::where('role_id',2)->count();
        return view('backend.dashboard',compact('bookcount','categorycount','usercount'));
    }
}
