<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Request;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\File as File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','desc')->get();
        return view('admin.category.list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('admin.category.create',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
        $file_name = $request->file('thumbnail')->getClientOriginalName();
        $category = new Category;

        $category->name = $request->name;
        $category->slug = changeTitle($request->name);
        $category->parent_id = $request->sltParent;
        $category->thumbnail = $file_name;
        $category->description = $request->description;
        $request->file('thumbnail')->move('upload/category/',$file_name);
        // $request->thumbnail->storeAs('category',$file_name);
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $category = Category::find($id);
        return response()->json(['data'=>$category],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        $parent = Category::select('id','name','parent_id')->get();
        return view('admin.category.update',compact('parent','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = Request::input('name');
        $category->slug = changeTitle(Request::input('name'));
        $category->parent_id = Request::input('sltParent');
        $category->description = Request::input('description');
        $img_current = 'upload/category/'.Request::input('img_current');
        if (!empty(Request::file('thumbnail'))) {
            $file_name = Request::file('thumbnail')->getClientOriginalName();
            $category->thumbnail = $file_name;
            Request::file('thumbnail')->move('upload/category/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Category::where('parent_id',$id)->count();
        if ($parent == 0) {
            Category::find($id)->delete();
            return redirect()->route('category.index');
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry! Bạn Không Thể Xóa Mục Này.');
                window.location = '";
                    echo route('category.index');
            echo "'    
            </script>";
        }
        
    }
}
