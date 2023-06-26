<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post_category;
use mysql_xdevapi\Exception;

class Post_categoryController extends Controller
{

    public function index()
    {
      $list = Post_category::paginate(10);
      return view('dashboard.post_category.index',['data'=>$list]);
    }
     
    public function create()
    {
      $list = Post_category::all();
      return view('dashboard.post_category.create',['data'=>$list]);
    }

     
    public function store(Request $request)
    {

      $image_name ='';
      $user_ids = 1;


      $request->validate([
        'name' => 'required|unique:Post_category|max:100',
        'cat_ordering' => 'numeric|max:10',
        'cat_keyword' => '|max:200',
        'cat_description' => 'max:200',
        'cat_image' => 'mimes:jpg,png,jpeg,gif,svg|dimensions:max_width=10000,max_height=10000',
      ],
      [
        'name.required'=>'Tên danh mục không để trống',
        'name.unique'=>'Tên danh mục đã tồn tại, không ươợc trùng',
        'name.max'=>'Dữ liệu tối đa 100 ký tự',
        'cat_ordering.required'=>'Dữ liệu phải là số',
        'cat_ordering.max'=>'Dữ liệu tối đa 10 ký tự',
        'cat_keyword.max'=>'Dữ liệu tối đa 200 ký tự',
        'cat_description.max'=>'Dữ liệu tối đa 200 ký tự',
        'cat_image.mimes'=>'Định dạng sai ( hình ảnh phải là file jpg,png,jpeg,gif,svg )',
        'cat_image.dimensions'=>'Kích thước hình ảnh quá lớn ( hình ảnh phải bé hơn 10000 pixel )',
      ]);

      if($request->file('cat_image')){
        $file= $request->file('cat_image');
        $filename= date('dmyHi').$file->getClientOriginalName();
        $file-> move(public_path('uploads'), $filename);
        $image_name = $filename;
      }

      $status = isset($request->is_active) ? 1 : 0;
      $category = new Post_category;
      $category->name = $request->name;
      $category->slug =  convert_text($request->name);
      $category->parent_id = $request->cat_parent;
      $category->keyword =  !empty($request->keyword) ? $request->keyword :"";
      $category->description = !empty($request->cat_description)? $request->cat_description :"";
      $category->image = $image_name;
      $category->ordering = $request->cat_ordering;
      $category->is_active = $status;
      $category->created_by = $user_ids;
      $category->updated_by = $user_ids;
      try {
        $category->save();
      } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
      }
      return redirect('dashboard/post-category/')->with('message','Thêm dữ liệu thành công');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
      $cate_list = Post_category::all();
      $category = Post_category::find($id);
      return view('dashboard.post_category.edit',[
       'index'=>$category,
        'data'=>$cate_list
      ]);
    }
  

    public function update(Request $request, $id)
    {
      $image_name ='';
      $user_ids = 1;
      $request->validate([
        'name' => 'required|max:100',
        'slug' => 'max:100',
          'cat_ordering' => 'numeric|max:10',
          'cat_keyword' => '|max:200',
          'cat_description' => 'max:200',
          'cat_image' => 'mimes:jpg,png,jpeg,gif,svg|dimensions:max_width=10000,max_height=10000',
        ],
        [
          'name.required'=>'Tên danh mục không để trống',
          'name.max'=>'Dữ liệu tối đa 100 ký tự',
          'slug.max'=>'Dữ liệu tối đa 100 ký tự',
          'cat_ordering.required'=>'Dữ liệu phải là số',
          'cat_ordering.max'=>'Dữ liệu tối đa 10 ký tự',
          'cat_keyword.max'=>'Dữ liệu tối đa 200 ký tự',
          'cat_description.max'=>'Dữ liệu tối đa 200 ký tự',
          'cat_image.mimes'=>'Định dạng sai ( hình ảnh phải là file jpg,png,jpeg,gif,svg )',
          'cat_image.dimensions'=>'Kích thước hình ảnh quá lớn ( hình ảnh phải bé hơn 10000 pixel )',
        ]);
      if($request->file('cat_image')){
        $file= $request->file('cat_image');
        $filename= date('dmyHi').$file->getClientOriginalName();
        $file-> move(public_path('public/uploads'), $filename);
        $image_name = $filename;
      }

      $status = isset($request->is_active) ? 1 : 0;
      $category = Post_category::find($id);
      dd( $category);
      $category->name = $request->name;
      $category->slug =   $request->slug;
      $category->parent_id = $request->cat_parent;
      $category->keyword =  !empty($request->keyword) ? $request->keyword :"";
      $category->description = !empty($request->cat_description)? $request->cat_description :"";
      $category->image = $image_name;
      $category->ordering = $request->cat_ordering;
      $category->is_active = $status;
      $category->created_by = $user_ids;
      $category->updated_by = $user_ids;
      try {
        $category->save();
      } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
      }
      return redirect('dashboard/post-category/')->with('message','thêm dữ liệu thành công');
    }

    public function destroy(Request $request)
    {
      $id = $request->post_id;
      $category = Post_category::find($id);
      $category->delete();
      return 'xóa thành công';
    }

    function upstatus(Request $request)
    {
      $id = $request->id;
      $category = Post_category::find($id);
      $category->is_active = $request->status;
      $category->save();
      return 'update thành công';
    }
}