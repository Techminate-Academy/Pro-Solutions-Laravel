<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Models
use App\Models\Category;
use App\Models\SubCategory;

class SubcategoryController extends Controller
{
    public function list(Request $request)
    {
        $data = SubCategory::where('is_active', 1)->get();;
        
        if($data){
            return $data->map(function($data, $key){
                return[
                    'id' => $data->id,
                    'category_id' => $data->category_id,
                    'name' => $data->name,
                    'category'=> $data->category->name
                ];
           });
        }else{
            return response(["message"=>'Data not found.'],500);
        }
    }

    public static function isCategory($data)
    {
        $dataExist = Category::where('id', $data->category_id)->first();

        if($dataExist == null){
            return 'Null';
        }else{
            return $data->category->name;
        }
    }
}
