<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
       $products = Product::all(); 
          
       // Return Json Response
       return response()->json([
            'results' => $products
       ],200);
    }
   
    public function store(ProductRequest $request)
    {
        try {
            // Create Product
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'availability' => $request->availability
            ]);
 
            // Return Json Response
            return response()->json([
                'message' => "Product successfully created."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }
   
    public function show($id)
    {
       // Product Detail 
       $products = Product::find($id);
       if(!$products){
         return response()->json([
            'message'=>'Product Not Found.'
         ],404);
       }
       
       // Return Json Response
       return response()->json([
          'products' => $products
       ],200);
    }
   
    public function update(ProductRequest $request, $id)
    {
        try {
            // Find Product
            $products = Product::find($id);
            if(!$products){
              return response()->json([
                'message'=>'Product Not Found.'
              ],404);
            }
       
            //echo "request : $request->image";
            $products->name = $request->name;
            $products->email = $request->email;
       
            // Update Product
            $products->save();
       
            // Return Json Response
            return response()->json([
                'message' => "Product successfully updated."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }
   
    public function destroy($id)
    {
        // Detail 
        $products = Product::find($id);
        if(!$products){
          return response()->json([
             'message'=>'Product Not Found.'
          ],404);
        }
         
        // Delete Product
        $products->delete();
       
        // Return Json Response
        return response()->json([
            'message' => "Product successfully deleted."
        ],200);
    }
}
