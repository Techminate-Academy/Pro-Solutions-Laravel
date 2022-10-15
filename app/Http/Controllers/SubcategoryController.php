<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function list(Request $request)
    {
        $data = DB::table('sub_categories')->get();
        
        if($data){
            return response([
                "message"=>'Data has been found',
                'data'=>$data
            ],200);
        }else{
            return response(["message"=>'Data not found.'],500);
        }
    }
}
