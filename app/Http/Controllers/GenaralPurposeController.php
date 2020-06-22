<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryType;
use DB;
class GenaralPurposeController extends Controller
{
   // Methode for view catories on user dashboard
   public function userHome()
   {
       $category = Category::select('id','category_name','slug','category_title','description','photo','category_type_id')		
	                  ->with('categoryType')
	                  ->orderBy('category_name')
	                  ->get();
   		return view('category_list',compact('category'));
   }

   // Methode for Search categories on user dasdhboard
   public function searchCategory(Request $request)
   {
   	   $q=$request->search; //Search key
       $url=url('/').'/Items'; //file path
       $category = Category::select('id','category_name','category_title','slug','description','photo','category_type_id')		
	                  ->where(function($query) use ($q){
	                      if($q){
	                        $query->where('category_name','LIKE',"%$q%");
	                      }
	                  })
	                  ->selectRaw(DB::raw('CONCAT_WS("/","'.$url.'",categories.id,categories.photo)')." as file_name")
	                  ->orWhereHas('categoryType',function ($query) use($q)
	                  {
	                  	if($q){
	                        $query->where('category_type','LIKE',"%$q%");
	                      }
	                  })
	                  ->orderBy('category_name')
	                  ->with('categoryType')
	                  ->get();
	                           
        return response()->json(['data' => $category],200);
   }

//View product
   public function viewProduct($slug)
   {
   		$category=Category::where('slug',$slug)->first();
      if(!$category)
        return abort(404);
   		return view('category_detail',compact('category'));
   }
   
}
