<?php

namespace App\Http\Controllers;

use password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
{
    public function dashboard(Request $req){
        $data=DB::table('products')->get();
        $query = DB::table('testings')
        ->join('products', 'testings.Product_id', '=', 'products.Product_Id')
        ->select('testings.*', 'products.Product_name');

    // Check for a search query and filter by product name
    if ($req->has('search') && $req->search != '') {
        $query->where('products.Product_name', 'LIKE', '%' . $req->search . '%');
    }

    // Execute the query
    $testings = $query->get();

    // Get all products for the dropdown
    $products = DB::table('products')->get();

    
        return view('Admin.Dashboard' , compact('data','testings', 'products', 'req'));
    }

    public function login(){
        return view('Admin.login');
    }
   
public function authenticate(Request $request){

$request->validate([
    'username'=> 'required|email',
    'password'=>'required',
]);
$user= User::where('Username',$request->username)->first();
if($user && Hash::check($request->password,$user->Password)){
Auth::login($user);
if ($user->Role == 'Admin') {
    return redirect()->route('dashboard');  
} elseif ($user->Role == 'Tester') {
    return redirect()->route('tester.dashboard');  
}
}
return back()->with('error', 'Invalid credentials');
}

public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
}

public function register(){
return view('Admin.signup');


}

public function TesterRegister(Request $request){

    $request->validate([
        'email'=>'required|email|unique:users,Username',
        'password'=>'required|confirmed',
        'role'=>'required|in:Tester',
    ]);
    
   User::create([
    'Username'=>$request->email,
'Password' => Hash::make($request->password),
    'Role'=>$request->role,
   ]);

   return redirect()->route('dashboard')->with('success', 'Tester registered successfully.');
    
    }
    

}
