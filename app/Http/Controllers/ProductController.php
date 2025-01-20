<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dotenv\Util\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }

    public function read(){
        $data=DB::table('products')->get();
        return view('products.read',['data'=>$data]);
        
    }

    
    public function store(Request $req){
$file=$req->file('file');
$filename= $file->getClientOriginalName();
$image=$file->storeAs('Productimages',$filename,'public');

        $validator = Validator::make($req->all(), [
            // 'product_code' => 'required|string|max:5',
            // 'bar_code' => 'required|string|max:5',
            'revision_version' => 'required|string|max:3',
            'manufacturing_number' => 'required|string|max:5',
            'product_name' => 'required|string|max:100',
            'manufacturing_date' => 'required|date',
            'status' => 'required|in:Pending,Tested,Failed,Remanufactured',
            'file'=>'nullable|file'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        

        do {
            $productCode = str_pad(random_int(0, 55555), 5, '0', STR_PAD_LEFT);
        } while (DB::table('products')->where('Product_code', $productCode)->exists());


$emp = DB::table('products')->insert([
// 'Product_Id' => $productId,
    'Product_code'=>$productCode,
    'Bar_code'=>$productCode,
    'Revision_version'=>$req->revision_version,
    'Manufacturing_number'=>$req->manufacturing_number,
    'Product_name'=>$req->product_name,
    'Manufacturing_date'=>$req->manufacturing_date,
    'Status'=>$req->status,
    'Image'=>$image,

]);
if($emp){
    return redirect()->route('product.read');
}
return back()->with('error', 'Failed to add product.');

    }

    public function show( string $productId){
        $data = DB::table('products')->where('Product_Id', $productId)->first();
        return view('products.show',['emp'=>$data]);
    }

    public function edit(string $id){
        $data=DB::table('products')->where('Product_Id',$id)->first();
        return view('products.update',['emp'=>$data]);
    }

    public function update(Request $req, string $id)


{
   
    
    $validator = Validator::make($req->all(), [
        'revision_version' => 'required|string|max:3',
        'manufacturing_number' => 'required|string|max:5',
        'product_name' => 'required|string|max:100',
        'manufacturing_date' => 'required|date',
        'status' => 'required|in:Pending,Tested,Failed,Remanufactured',
        'file'=>'nullable|file|mimes:jpg,jpeg,png|max:2048'
    ]);

    $image = null;
    if ($req->hasFile('file')) {
        $file = $req->file('file');
        $filename = $file->getClientOriginalName();
        $image = $file->storeAs('Productimages', $filename, 'public'); // Store the file
    } else {
        // Keep the existing image if no file is uploaded
        $existingProduct = DB::table('products')->where('Product_Id', $id)->first();
        $image = $existingProduct->Image ?? null;
    }


 
    $emp = DB::table('products')->where('Product_Id', $id)->update([
    'Product_id'=>$req->product_id,
    'Product_code'=>$req->product_code,
    'Bar_code'=>$req->product_code,
    'Revision_version'=>$req->revision_version,
    'Manufacturing_number'=>$req->manufacturing_number,
    'Product_name'=>$req->product_name,
    'Manufacturing_date'=>$req->manufacturing_date,
    'Status'=>$req->status,
    'Image'=>$image,
    ]);

    if ($emp) {
        return redirect()->route('product.read')->with('success', 'Product updated successfully.');
    }

    return back()->with('error', 'Failed to update product.');
}

    public function delete(string $id){
        $data=DB::table('products')->where('Product_Id',$id)->delete();
        return view('products.delete',['emp'=>$data]);

    
    }
}
