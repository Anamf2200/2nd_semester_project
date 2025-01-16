<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;

class TestingController extends Controller
{
    public function create()
    {
        $products = DB::table('products')->get();
        return view('Testing.create', compact('products'));
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'product_id' => 'required|exists:products,Product_Id',
            'test_type' => 'required|string|max:50',
            'test_date' => 'required|date',
            'tested_by' => 'required|string|max:100',
            'test_criteria' => 'required|string',
            'test_result' => 'required|in:Pass,Fail',
            'remarks' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        do {
            $testId = str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (DB::table('testings')->where('Test_id', $testId)->exists());


        $emp = DB::table('testings')->insert([
            'Test_id' => $testId,
            'Product_id' => $req->product_id,
            'Test_type' => $req->test_type,
            'Test_date' => $req->test_date,
            'Tested_by' => $req->tested_by,
            'Test_criteria' => $req->test_criteria,
            'Test_result' => $req->test_result,
            'Remarks' => $req->remarks,


        ]);
        if ($emp) {
            return redirect()->route('testing.read');
        } else {
            return back()->with('error', 'Failed to test product.');
        }
    }

    public function read()
    {
        $testings = DB::table('testings')
            ->join('products', 'testings.Product_id', '=', 'products.Product_Id')
            ->select('testings.*', 'products.Product_name')
            ->get();

        return view('Testing.read', compact('testings'));
    }

    public function edit(string $id)
{
    $data = DB::table('testings')->where('Test_id', $id)->first();
    $products = DB::table('products')->get(); 
    return view('testing.update', ['emp' => $data, 'products' => $products]);
}
public function show(string $id)
{
    $data = DB::table('testings')->where('Test_id', $id)->first();
    $product = DB::table('products')->where('Product_Id', $data->Product_id)->first();
    return view('testing.show', ['emp' => $data, 'products' => $product]);
}


    public function update(Request $req, string $id)
    {
        $validator = Validator::make($req->all(), [
            'test_id' => 'required|exists:testings,Test_id',
            'product_id' => 'required|exists:products,Product_Id',
            'test_type' => 'required|string|max:50',
            'test_date' => 'required|date',
            'tested_by' => 'required|string|max:100',
            'test_criteria' => 'required|string',
            'test_result' => 'required|in:Pass,Fail',
            'remarks' => 'required|string',
        ]);



        $emp = DB::table('testings')->where('Test_id',$id)->update([
            'Test_id' => $id,
            'Product_id' => $req->product_id,
            'Test_type' => $req->test_type,
            'Test_date' => $req->test_date,
            'Tested_by' => $req->tested_by,
            'Test_criteria' => $req->test_criteria,
            'Test_result' => $req->test_result,
            'Remarks' => $req->remarks,


        ]);

        if($emp){
            return redirect()->route('testing.read');
        }
        return back()->with('error','not updated');
        
        
    }

    public function delete(string $id){
        $data=DB::table('testings')->where('Test_id',$id)->delete();
        return view('testing.delete',['emp'=>$data]);

    
    }
}
