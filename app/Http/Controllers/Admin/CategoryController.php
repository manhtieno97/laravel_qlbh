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
    	$data['catlist']=category::paginate(4);
    	return view('backend.category',$data);
    }
    public function postCat(categoryRequest $request)
    {
        if(category::onlyTrashed()->where('name',$request->name)->restore()!=0)
        {
            return back()->with('success','Thêm thành công');
         
        }else{
            $validatedData = $request->validate([
                'name' => 'unique:category,name',
                
            ],['name.unique'=>'Tên danh mục bị trùng']);
                DB::table('category')->insertGetId(
                    ['name' => $request->input('name'),
                    'cat_slug' => str_slug($request->input('name')),
                    'status' => $request->input('status')
                    ] 
                );
                return back()->with('success','Thêm thành công');
            }        
    }

    public function editCat($id)
    {
        $data['catlist']=category::paginate(4);
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
