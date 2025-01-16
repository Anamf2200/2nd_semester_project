<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FailedTestController extends Controller
{
    public function create(){
        $test_types = DB::table('testings')->get();
        return view('Failed.create', compact('test_types'));
    }

    public function store(Request $req){
$validator=Validator::make($req->all(),[
'test_type'=>'required|exists:testing,Test_id',
'failure_reason'=>'required|string',
'remanufactured_date'=>'required|date',
'remarks'=>'required|string',
]);

$emp=DB::table('failed_test')->insert([

'Test_id'=>$req->test_type,
'Failure_reason'=>$req->failure_reason,
'Remanufactured_date'=>$req->remanufactured_date,
'Remarks'=>$req->remarks,
]);

if($emp){
    return redirect()->route('failed.read');
}
    }


    public function read(){
        $failedTest=DB::table('failed_test')
        ->join('testings','failed_test.Test_id','=','testings.Test_id')
        ->select('failed_test.*','testings.Test_type')
        ->get();

        return view('Failed.read',compact('failedTest'));
    }

    public function edit(string $id)
    {
        $data = DB::table('failed_test')->where('Failed_id', $id)->first();
        $testings = DB::table('testings')->get(); 
        return view('failed.update', ['emp' => $data, 'testings' => $testings]);
    }
    
    public function show(string $id)
    {
        $data = DB::table('failed_test')->where('Failed_id', $id)->first();
        $testings = DB::table('testings')->get(); 
        return view('failed.show', ['test' => $data, 'testings' => $testings]);
    }

    public function update(Request $req,string $id){
        $validator=Validator::make($req->all(),[
            'test_type'=>'required|exists:testing,Test_id',
            'failure_reason'=>'required|string',
            'remanufactured_date'=>'required|date',
            'remarks'=>'required|string',
            ]);
            
            $emp=DB::table('failed_test')->where('Failed_id',$id)->update([
            'Failed_id'=>$id,
            'Test_id'=>$req->test_type,
            'Failure_reason'=>$req->failure_reason,
            'Remanufactured_date'=>$req->remanufactured_date,
            'Remarks'=>$req->remarks,
            ]);
            
            if($emp){
                return redirect()->route('failed.read');
            }

           
    }
    public function delete(string $id){
             $data=DB::table('failed_test')->where('Failed_id',$id)->delete();
             return view('failed.delete',['emp'=>$data]);   
    }
}
