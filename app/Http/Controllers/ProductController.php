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


        $validator = Validator::make($req->all(), [
            'product_code' => 'required|string|max:5',
            'revision_version' => 'required|string|max:3',
            'manufacturing_number' => 'required|string|max:5',
            'product_name' => 'required|string|max:100',
            'manufacturing_date' => 'required|date',
            'status' => 'required|in:Pending,Tested,Failed,Remanufactured',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        

        do {
            $productId = str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
        } while (DB::table('products')->where('Product_Id', $productId)->exists());


$emp = DB::table('products')->insert([
'Product_Id' => $productId,
    'Product_code'=>$req->product_code,
    'Revision_version'=>$req->revision_version,
    'Manufacturing_number'=>$req->manufacturing_number,
    'Product_name'=>$req->product_name,
    'manufacturing_date'=>$req->manufacturing_date,
    'Status'=>$req->status,

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

    public function update(Request $req, string $id){
        $validator = Validator::make($req->all(), [
            'product_code' => 'required|string|max:5',
            'revision_version' => 'required|string|max:3',
            'manufacturing_number' => 'required|string|max:5',
            'product_name' => 'required|string|max:100',
            'manufacturing_date' => 'required|date',
            'status' => 'required|in:Pending,Tested,Failed,Remanufactured',
        ]);

        
$emp = DB::table('products')->where('Product_Id',$id)->update([
    'Product_Id' => $id,
        'Product_code'=>$req->product_code,
        'Revision_version'=>$req->revision_version,
        'Manufacturing_number'=>$req->manufacturing_number,
        'Product_name'=>$req->product_name,
        'manufacturing_date'=>$req->manufacturing_date,
        'Status'=>$req->status,
    
    ]);
    if($emp){
        return redirect()->route('product.read');
    }
    return back()->with('error', 'Failed to add product.');
       
    }
    public function delete(string $id){
        $data=DB::table('products')->where('Product_Id',$id)->delete();
        return view('products.delete',['emp'=>$data]);

    
    }
}
