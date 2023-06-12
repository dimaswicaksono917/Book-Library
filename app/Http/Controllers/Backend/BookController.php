<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('backend.book.index', compact('books'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('backend.book.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn'     => 'required|unique:books',
            'title' => 'required',
            'author'    => 'required',
            'desc'   => 'required',
            'image'    => 'required',
            'category' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileImage = ($request['title']) . '-image.' . $request->image->getClientOriginalName();
            $pathImage = 'upload/books/image/';
            $validated['image'] = $pathImage . $fileImage;
            // move  file
            $request->image->move(public_path($pathImage), $fileImage);
        }


        $store = Book::create([
            'isbn'     => $request->isbn,
            'title'     => $request->title,
            'author'     => $request->author,
            'desc'     => $request->desc,
            'image' => $validated['image'],
            'category'     => $request->category,
        ]);

        if ($store) {
            return redirect()->route('book.index')->with(['type' => 'success', 'message' => 'Save data success']);
        }

        return redirect()->route('book.index')->with(['type' => 'danger', 'message_error' => 'Save data failed']);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $data = Book::findorfail($id);
        return view('backend.book.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data      = Book::findOrFail($id);
        $validated = $request->validate([
            'isbn'     => 'required|unique:books',
            'title' => 'required',
            'author'    => 'required',
            'desc'   => 'required',
            'image'    => 'required',
            'category' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileImage = ($request['title']) . '-image.' . $request->image->getClientOriginalName();
            $pathImage = 'upload/books/image/';
            $validated['image'] = $pathImage . $fileImage;
            // move  file
            $request->image->move(public_path($pathImage), $fileImage);
        }
        $oldImage = public_path($data->image);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }
        $data->update($validated);

        if($data){
            return redirect()->route('book.index')->with(['type' => 'success', 'message' => 'Save data success']);
        }

        return redirect()->route('book.index')->with(['type' => 'danger', 'message_error' => 'Save data failed']);
    }

    public function view($id){
    $data = Book::find($id);
        return view('backend.book.view',compact('data'));
    }

    public function delete($id)
    {
        $data = Book::find($id);

        $oldImage = public_path($data->image);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        $data->delete();

        if($data){

            return redirect()->route('book.index')->with(['type' => 'success', 'message' => 'Delete data success']);
        }

        return redirect()->route('book.index')->with(['type' => 'danger', 'message_error' => 'Delete data failed']);
    }
}
