<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestLogsController extends Controller
{
    public function create(){
        $test_id=DB::table('testings')->get();
        $dept_id=DB::table('departments')->get();
        return view('Testlogs.create',compact('test_id','dept_id'));
        
    }

    public function read(){
        $testings=DB::table('test_logs')
        ->join('testings','test_logs.Test_id','=','testings.Test_id')
        ->join('departments','test_logs.Department_id','=','departments.Department_id')
        ->select( 'test_logs.Log_id','testings.Test_id','testings.Test_type','test_logs.Test_id','departments.Department_id','departments.Department_name','test_logs.Test_date','test_logs.Status','test_logs.Remarks')
        ->get();

       

        return view('testlogs.read',compact('testings'));
    }




    public function store(Request $req){
$validator=Validator::make($req->all(),[
'test_id'=>'required|exists:testings,Test_id',
'department_id'=>'required|exists:departments,Department_id',
'test_date'=>'required|date',
'status'=>'required|in:Progress,Completed',
'remarks'=>'required|string',

]);

$emp=DB::table('test_logs')->insert([

    'Test_id'=>$req->test_id,
    'Department_id'=>$req->department_id,
    'Test_date'=>$req->test_date,
    'Status'=>$req->status,
    'Remarks'=>$req->remarks,
    ]);
    
    if($emp){
        return redirect()->route('testlog.read');
    }

    }

    public function edit(string $id){
        $data = DB::table('test_logs')->where('Log_id', $id)->first();
        $testings = DB::table('testings')->get(); 
        $department=DB::table('departments')->get();
        return view('testlogs.update', ['emp' => $data, 'testings' => $testings,'department'=>$department]);
        
    }
    public function show(string $id){
        $data = DB::table('test_logs')->where('Log_id', $id)->first();
        $testings = DB::table('testings')->get(); 
        $department=DB::table('departments')->get();
        return view('testlogs.show', ['emp' => $data, 'testings' => $testings,'department'=>$department]);
        
    }




    public function update(Request $req, string $id){
        $validator=Validator::make($req->all(),[
            'test_id'=>'required|exists:testings,Test_id',
            'department_id'=>'required|exists:departments,Department_id',
            'test_date'=>'required|date',
            'status'=>'required|in:Progress,Completed',
            'remarks'=>'required|string',
            
            ]);

            $emp=DB::table('test_logs')->where('Log_id',$id)->update([
                'Log_id'=>$id,
                'Test_id'=>$req->test_id,
                'Department_id'=>$req->department_id,
                'Test_date'=>$req->test_date,
                'Status'=>$req->status,
                'Remarks'=>$req->remarks,
                ]);

                if($emp){
                    return redirect()->route('testlog.read');
                }


    }

    public function delete(string $id){
        $data=DB::table('test_logs')->where('Log_id',$id)->delete();
        return view('testlogs.delete',['emp'=>$data]); 
    }
}
