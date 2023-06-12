<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function landing()
    {
        $booknew = Book::latest()->take(4)->get();
        $allbook = Book::take(4)->get();
        $category = Category::all();
        return view('frontend.landing', compact('booknew','category','allbook'));
    }

    public function allbook(Request $request)
    {
        $category = Category::all();
        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $book = Book::query()
                ->where('isbn', 'like', '%' . $searchTerm . '%')
                ->orWhere('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('author', 'like', '%' . $searchTerm . '%')
                ->get();
        } else {
            $book = Book::all();
        }
        return view('frontend.allbook', compact('book', 'category'));
    }

    public function viewallbook($id)
    {
        $data = Book::where('id', $id)->first();
        return view('frontend.viewbook', compact(
            'data'
        ));
    }

    public function profile()
    {
        $me = Auth::id();
        $history = History::with(['user', 'book'])->where('user_id', $me)->get();
        return view('frontend.profile', compact('history','me'));
    }
}
