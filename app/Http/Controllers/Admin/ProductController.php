<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\product;
use App\Models\category;
use DB;

class ProductController extends Controller
{
    public function getPro()
    {
    $data['productlist']=DB::table('product')->join('category','product.cat_id','=','category.id')->orderBy('product.pro_id','desc')->get();
       return view('backend.product',$data);
    }

    public function getSeePro($id)
    {
        $data['product']=product::find($id);
        $data['category']=category::all();
       return view('backend.see_product',$data);
    }
    public function getAddPro()
    {
      $data['catlist']=DB::table('category')->get();
       return view('backend.addproduct',$data);
    }
    public function postAddPro(AddProductRequest $request)
    {
        $file_name=$request->img->getClientOriginalName();
        $price=implode("",explode(",",$request->price));
         $accessories=[];
        array_push($accessories,$request->sac);
        array_push($accessories,$request->tainghe);
        array_push($accessories,$request->balo);
        $accessorie=implode(",",$accessories);
        DB::table('product')->insertGetId([
          'pro_name'=>$request->name,
          'pro_slug'=>str_slug($request->name),
          'img'=>$file_name,
          'price'=>(int)$price,
          'accessories'=>$accessorie,
          'warranty'=>$request->warranty,
          'promotion'=>$request->promotion,
          'pro_status'=>$request->status,
          'description'=>$request->description,
          'cat_id'=>$request->cat_id,
          'featured'=>$request->featured,
        ]);
        $request->img->move('avatar',$file_name);
        return redirect()->intended('admin/product');
    }
    public function getEditPro($id)
    {
        $data['product']=product::find($id);
        $data['category']=category::all();
        return view('backend.editproduct',$data);
    }
    public function postEditPro(Request $request,$id)
    {
       $product=new product;
       $arr['pro_name']=$request->name;
       $arr['pro_slug']=str_slug($request->name);
       $price=implode("",explode(",",$request->price));
       $arr['price']=(int)$price;
       $arr['accessories']=$request->accessories;
       $arr['warranty']=$request->warranty;
       $arr['promotion']=$request->promotion;
       $arr['pro_status']=$request->status;
       $arr['description']=$request->description;
       $arr['cat_id']=$request->cat_id;
       $arr['featured']=$request->featured;
       if($request->hasFile('img'))
       {
        $img=$request->img->getClientOriginalName();
        $arr['img']=$img;
        $request->img->move('avatar',$img);
       }
       $product::where('pro_id',$id)->update($arr);
       return redirect()->intended('admin/product');
    }
    public function deletePro($id)
    {
        product::destroy($id);
        return back();
    }

}
