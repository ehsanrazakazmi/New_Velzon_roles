<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
//-----------------------------------------------------------------------------------------------------------------------------





    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('User-Management..Products.list',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('User-Management.Products.edit',compact('product'));
    }


    public function update(Request $request, $id)
    {

        // dd($id);

        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Product::find($id)->update(
            [
                'name' => $request->name,
                'detail'=>$request->detail,
            ]);
    
        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }


    public function destroy($id)
    {
        // $product->delete();
        Product::find($id)->delete();
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
