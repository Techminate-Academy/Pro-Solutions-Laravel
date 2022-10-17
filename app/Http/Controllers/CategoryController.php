<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\DeletedRecord;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required',
        ]);

        $data = [
            'name' => $fields['name'],
        ];

        $newCategory = Category::create($data);

        //check in record_delete table
        $dataExist = DeletedRecord::where('record_str', $newCategory->name)->first();

        if($dataExist){
            $category_id = $dataExist->record_id;
            $subCategories = SubCategory::where('category_id', $category_id)->get();

            foreach($subCategories as $subCategory){
                $subCategory->category_id = $newCategory->id;
                $subCategory->is_active = 1;
                $subCategory->save();
            }

            $dataExist->delete();

            return response([
                "message"=>'Data has created and related forign keys are replaced.',
                'data'=>$subCategories
            ],200);
        }else{
            return response([
                "message"=>'Data has been saved successfully.',
                'data'=>$newCategory
            ],200);
        }
    }

    public function delete($id)
    {
        $dataExist = Category::where('id', $id)->first();
        
        if($dataExist){
            $data = [
                'record_id' => $dataExist->id,
                'table_name' => 'categories',
                'record_str' => $dataExist->name
            ];
            $success = DeletedRecord::create($data);

            $subCategories = SubCategory::where('category_id', $dataExist->id)->get();

            foreach($subCategories as $subCategory){
                $subCategory->is_active = 0;
                $subCategory->save();
            }
    
            $dataExist->delete();

            return response([
                "message"=>'Data has been deleted.',
            ],200);
        }else{
            return response(["message"=>'Data not found.'],404);
        }
    }
}
