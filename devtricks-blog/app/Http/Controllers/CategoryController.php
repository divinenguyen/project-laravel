<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class CategoryController extends Controller
{
   function list(){
        $list = Category::paginate(5);
        return view('admin.categories.list',['data'=>$list]);
   }
   function add(){
       return view('admin.categories.add');
   }
   function postadd(Request $request){
       $this->validate($request,[
           'name'=>'required|max:100|unique:categories',
           'slug_name'=>'max:100',
           'parent'=>'max:10|numeric',
           'keyword'=>'max:150',
           'description'=>'max:170'
       ],[
           'name.required'=> 'Tên thể loại là bắt buộc',
           'name.max'=> 'Tên thể loại không quá 100 ký tự',
           'name.unique'=> 'Tên thể loại đã tồn tại',
           'slug_name.max'=> 'Slug thể loại không quá 100 ký tự',
           'parent.max'=> 'Parent không quá 10 ký tự',
           'parent.numeric'=> 'Parent phải là số',
           'keyword.max'=> 'Từ khóa không quá 150 ký tự',
           'description.max'=> 'Miêu tả không quá 170 ký tự',
       ]);
       $status = isset($request->status) ? 1 : 0;

       $category = new Category;
       $category->name = $request->name;
       $category->slug = !empty($request->slug_name) ? $request->slug_name : changeTitle($request->name);
       $category->parent_id = $request->parent;
       $category->keyword = !empty($request->keyword)? $request->keyword :"";
       $category->description = !empty($request->description)? $request->description :"";
       $category->status = $status;
       $category->save();
       return redirect('admin/category/add')->with('message','thêm dữ liệu thành công');
   }
   function update($id){
       $index = Category::find($id);
       return view('admin.categories.edit',['index'=>$index]);
   }
    function postupdate(Request $request,$id){

        $this->validate($request,[
            'name'=>'required|max:100|unique:categories',
            'slug_name'=>'max:100',
            'parent'=>'max:10|numeric',
            'keyword'=>'max:150',
            'description'=>'max:170'
        ],[
            'name.required'=> 'Tên thể loại là bắt buộc',
            'name.max'=> 'Tên thể loại không quá 100 ký tự',
            'name.unique'=> 'Tên thể loại đã tồn tại',
            'slug_name.max'=> 'Slug thể loại không quá 100 ký tự',
            'parent.max'=> 'Parent không quá 10 ký tự',
            'parent.numeric'=> 'Parent phải là số',
            'keyword.max'=> 'Từ khóa không quá 150 ký tự',
            'description.max'=> 'Miêu tả không quá 170 ký tự',
        ]);
        $status = isset($request->status) ? 1 : 0;

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = !empty($request->slug_name) ? $request->slug_name : changeTitle($request->name);
        $category->parent_id = $request->parent;
        $category->keyword = !empty($request->keyword)? $request->keyword :"";
        $category->description = !empty($request->description)? $request->description :"";
        $category->status = $status;
        $category->save();
        return redirect('admin/category/list')->with('message','cập nhật dữ liệu thành công');
    }
    function upstatus(Request $request) {
       $id = $request->id;
        $category = Category::find($id);
        $category->status = $request->status;
        $category->save();
        return 'update thành công';
    }
    function trash(Request $request){
       $id = $request->post_id;
        $category = Category::find($id);
        $category->delete();
        return 'xóa thành công';
    }
}
