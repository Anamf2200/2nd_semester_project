<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TesterController extends Controller
{
    public function TesterDashboard(Request $req){
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

    
        return view('Admin.Tester_dashboard' , compact('data','testings', 'products', 'req'));

    }
}
