<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
//-----------------------------------------------------------------------------------------------------------------------------



    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('Product-Management.Products.list',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'detail' => 'required',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->with('warning', 'Cannot add duplicate product');
        }
    
        Product::create($request->all());
    
        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }


    public function edit($id)
    {
        $id = decrypt($id);
        $product = Product::find($id);
        return view('Product-Management.Products.edit',compact('product'));
    }


    public function update(Request $request, $id)
    {
        $id = decrypt($id);
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
        $id = decrypt($id);
        Product::find($id)->delete();
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
