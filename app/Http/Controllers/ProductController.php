<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productCreate()
    {
        // echo "ghhh";die;
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data['image'] = $fileName;
        }
        $create = Product::create($data);
        return redirect()->route('product.list')->with('success', 'Product added successfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data['image'] = $fileName;
        }
        $create = Product::where('id', $id)->update($data);
        return redirect()->route('product.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {   
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        return response()->json('success');
    }
    public function productDetails(Request $request){
        $id = $request->id;
        $product = Product::where('id',$id)->with('ProductDetail')->first();
        return view('admin.product.productDetails', compact('id','product'));
    }
    public function productDetailsStore(Request $request){
        $id = $request->id;
        $data = array(
            'title' => $request->title,
            'product_id' => $id,
            'total_items' => $request->total_items,
            'description' => $request->description
        );
        $details = ProductDetails::updateOrCreate(
            ['product_id' => $id],
            $data
        );
        $request->session()->flash('success','Employee added successfully');

        return redirect()->route('product.list');
    }
}
