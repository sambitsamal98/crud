<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        //GET-all data from databse
           $product = Product::all();

           return response()->json($product);
    }

   
    public function store(Request $request)
    {
        //POST-post data to database for user

         $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            //'photo'=>'required',
            'description'=>'required'
         ]);

        $product = new Product();

        // if($request->hashFile('photo')){
        //     $file = $request->file('photo');
        //     $allowedfileExtention = ['pdf','png','jpg'];
        //     $extention=$file ->getClientOriginalExtension();
        //     $check = in_array( $extention,$allowedfileExtention);

        //     if($check){
        //         $name=time() . $file->getClientOriginalName();
        //         $file->move('images',$name);
        //         $product->photo=$name;
        //     }
        // }
              $product->title = $request->input('title');
              $product->price = $request->input('price');
              $product->description = $request->input('description');

              $product->save();

              return response()->json($product);

    }

    
    public function show($id)
    {
        //give 1 item for product table
        $product = Product::find($id);
           
        return response()->json($product);
    }
 
    public function update(Request $request, $id)
    {
        //UPDATE- update  data in the table 
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
           // 'photo'=>'required',
            'description'=>'required'
         ]);

         $product = Product::find($id);

        //  if($request->hashFile('photo')){
        //     $file = $request->file('photo');
        //     $allowedfileExtention = ['pdf','png','jpg'];
        //     $extention=$file ->getClientOriginalExtension();
        //     $check = in_array( $extention,$allowedfileExtention);

        //     if($check){
        //         $name=time() . $file->getClientOriginalName();
        //         $file->move('images',$name);
        //         $product->photo=$name;
        //     }
        // }


         $product->title = $request->input('title');
         $product->price = $request->input('price');
         $product->description = $request->input('description');

         $product->save();

         return response()->json($product);
    }

    
    public function destroy($id)
    {
        //Delete -ID
        $product = Product::find($id);
           $product->delete();
        return response()->json('product deleted successfully');
    }
}
