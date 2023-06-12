<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\History;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class HistoryController extends Controller
{
    public function index()
    {
        $borrow = History::with(['user', 'book'])->get();
        return view('backend.history.index', compact('borrow'));
    }
    public function create()
    {
        $username = User::where('role_Id', 2)->get();
        $book = Book::all();
        return view('backend.history.create', compact('username', 'book'));
    }
    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            return redirect()->route('history.index')->with(['type' => 'danger', 'message_error' => 'Cannot borrow, books are not available']);
        } else {
            try {
                DB::beginTransaction();
                History::create($request->all());
                $book = Book::findOrFail($request->book_id);
                $book->status = 'not available';
                $book->save();
                DB::commit();

                return redirect()->route('history.index')->with(['type' => 'success', 'message' => 'Borrow book success']);
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
            }
        }
    }

    public function return()
    {
        $username = User::where('role_Id', 2)->get();
        $book = Book::all();
        return view('backend.history.return', compact('username', 'book'));
    }

    public function returnSave(Request $request)
    {
        $history = History::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $book = Book::findOrFail($request->book_id)->only('status');
        $historyData = $history->first();
        $countData = $history->count();

        if ($countData == 1) {
            $historyData->actual_return_date = Carbon::now()->toDateString();
            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();
            $historyData->save();

            return redirect()->route('history.index')->with(['type' => 'success', 'message' => 'The book is return successfully']);
        } else {
            return redirect()->route('history.index')->with(['type' => 'danger', 'message_error' => 'There is error in process']);
        }
    }
}
