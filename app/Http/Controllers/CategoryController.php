<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryType;
use Illuminate\Http\Request;
use File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        return view('category_list_admin',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=CategoryType::pluck('category_type','id');
        return view('category_add',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $categ=new Category();
        $categ->category_type_id = $request->category_type;
        $categ->category_name = $request->category_name;
        $categ->photo = $_FILES['photo']['name'];
        $categ->category_title = $request->category_title;
        $categ->description = $request->description;
        $categ->save();

        //File Upload Section
        if($_FILES['photo']['tmp_name']){
            $path = public_path().'/Items/';//folder path
            if (!file_exists($path.$categ->id)) {  //file checking
                    File::makeDirectory($path.$categ->id, $mode = 0777, true, true); //Folder creation
                    $uploadfile = $path.$categ->id.'/'. basename($_FILES['photo']['name']);
                    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);  //File Upload
                }
           }

        $request->session()->flash('success', 'Saved Successfully !!');   

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return view('category',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $file_delete = public_path().'/Items/'.$category->id.'/'.$category->photo;   
       if($category){
                 $category->delete();
                  unlink($file_delete);
                 return response()->json(['success' => 'deleted'],200);
            }else{
                return response()->json(['success' => 'cannot_delete'],200);
            }
    }
}
