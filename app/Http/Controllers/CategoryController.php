<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', '1')->get();
        // echo "<pre>"; print_r($categories); die;
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('category_id')->get();
        // echo "<pre>"; print_r($categories); die;
        return view('admin.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id
            // 'type' => 
        );
        $create = Category::create($data);
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Category $category)
    {
        $id = $request->id;
        $categories = Category::whereNull('category_id')->get();
        $category = Category::find($id);
        return view('admin.category.edit', compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $id =  $request->id;
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id
        );
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('category.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete();
        return response()->json('success');
    }
}
