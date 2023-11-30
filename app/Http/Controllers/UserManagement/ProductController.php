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
        $products = Product::latest()->paginate(5);     // gets products by latest arrangement
        return view('Product-Management.Products.list',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function store(Request $request)
    {
        // validates the name and detail
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'detail' => 'required',
        ]);
        // prints the follwing statement if validation fails
        if ($validator->fails())
        {
            return redirect()->back()->with('warning', 'Cannot add duplicate product');
        }
        // it will store the validated data into the database
        Product::create($request->all());
        
        // redirect back to the list page after
        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }

    public function edit($id)
    {
        $id = decrypt($id);   // decrypts the id after encryption in the blade file
        $product = Product::find($id);  // feed the product variable into the blade file
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
        Product::find($id)->delete();   // delete the several id through the method
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
