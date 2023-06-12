<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required',
        ]);

        $store = Category::create([
            'name'=> $request->name
        ]);

        if ($store) {
            return redirect()->route('category.index')->with(['type' => 'success', 'message' => 'Save data success']);
        }

        return redirect()->route('category.index')->with(['type' => 'danger', 'message_error' => 'Save data failed']);
    }

    public function edit($id)
    {
        $data = Category::findorfail($id);
        return view('backend.category.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data      = Category::findOrFail($id);
        $validated = $request->validate([
            'name'     => 'required',
        ]);
        $data->update($validated);
        if($data){
            return redirect()->route('category.index')->with(['type' => 'success', 'message' => 'Save data success']);
        }
        return redirect()->route('category.index')->with(['type' => 'danger', 'message_error' => 'Save data failed']);
    }

    public function delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        if($data){
            return redirect()->route('category.index')->with(['type' => 'success', 'message' => 'Delete data success']);
        }
        return redirect()->route('category.index')->with(['type' => 'danger', 'message_error' => 'Delete data failed']);
    }

}
