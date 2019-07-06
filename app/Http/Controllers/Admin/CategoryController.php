<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Http\Requests\categoryRequest;
use App\Http\Requests\editCatRequest;
use DB;
class CategoryController extends Controller
{
    public function getCat()
    {
    	$data['catlist']=category::all();
    	return view('backend.category',$data);
    }
    public function postCat(categoryRequest $request)
    {
        $cat_id=DB::table('category')->insertGetId(
        ['name' => $request->input('name'),
        'cat_slug' => str_slug($request->input('name')),
        'status' => $request->input('status')
        ] 
        );
        return back();
    }

    public function editCat($id)
    {
        $data['catlist']=category::all();
    	$data['catEdit']=category::find($id);
    	return view('backend.editcategory',$data);
    }

    public function postEditCat(editCatRequest $request,$id)
    {
        DB::table('category')
            ->where('id',$id)
            ->update([
               'name'=>$request->name,
               'cat_slug'=>str_slug($request->name),
               'status'=>$request->status,
               ]);
    
        return redirect()->intended('admin/category');
    }
    public function deleteCat($id)
    {
        $cat=category::find($id);
        $cat->delete();
        return back();
    }

    

}
