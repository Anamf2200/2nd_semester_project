<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use PDO;

class DepartmentController extends Controller
{
    public function create(){
        return view('department.create');
    }
    public function read(){

        $data=DB::table('departments')->get();
        return view('department.read',['data'=>$data]);

    }
    public function store(Request $req){
        $validator=Validator::make($req->all(),[
            'Department_name'=>'required|string',
            'Test_type_handled'=>'required|string',
        ]);

        $emp= DB::table('departments')->insert([
            'Department_name'=>$req->department_name,
            'Test_type_handled'=>$req->test_type_handled,
        ]);
        if($emp){
            return redirect()->route('dept.read');
        }


    }
    
    public function edit(string $id){
        $data=DB::table('departments')->where('Department_id',$id)->first();
        return view('department.update',['emp'=>$data]);
    }

    public function update(Request $req, string $id){
        $validator=Validator::make($req->all(),[
            'Department_name'=>'required|string',
            'Test_type_handled'=>'required|string',
        ]);
        $emp= DB::table('departments')->where('Department_id',$id)->update([
            'Department_name'=>$req->department_name,
            'Test_type_handled'=>$req->test_type_handled,
        ]);
        if($emp){
            return redirect()->route('dept.read');
        }

    }

    public function delete(string $id){
        $data=DB::table('departments')->where('Department_id',$id)->delete();
             return view('department.delete',['emp'=>$data]);   
    }

    public function show(string $id ){
        $data=DB::table('departments')->where('Department_id',$id)->first();
        return view('department.show',['emp'=>$data]);
    }
}
