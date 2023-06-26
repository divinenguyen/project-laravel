<?php

namespace App\Http\Controllers;

use App\Models\Post_category;
use App\Models\Post_category_news;
use App\Models\Post_news;
use App\Models\Post_tag_news;
use App\Models\Post_tags;
use Illuminate\Http\Request;

class Post_newsController extends Controller
{
  public function index()
  {
    $list = Post_news::paginate(10);
    return view('dashboard.post_news.index',['data'=>$list]);
  }

  public function create()
  {
    $category = Post_category::where('parent_id', '=', 0)->get();
    $allcategory = Post_category::pluck('name','id')->all();
    $tags = Post_tags::all();
    return view('dashboard.post_news.create',compact('category','allcategory','tags'));

  }

  public function store(Request $request)
  {
    $image_name ='';
    $user_ids = 1;
    $request->validate(
      [
        'name' => 'required|unique:post_news|max:150',
        'keyword' => '|max:200',
        'summary' => 'max:200',
        'post_image' => 'mimes:jpg,png,jpeg,gif,svg|dimensions:max_width=10000,max_height=10000',
      ],
      [
        'name.required'=>'Tiêu đề bài viết  không để trống',
        'name.unique'=>'Tiêu đề bài viết đã tồn tại, không được trùng',
        'name.max'=>'Dữ liệu tối đa 100 ký tự',
        'keyword.max'=>'Dữ liệu tối đa 200 ký tự',
        'summary.max'=>'Dữ liệu tối đa 200 ký tự',
        'post_image.mimes'=>'Định dạng sai ( hình ảnh phải là file jpg,png,jpeg,gif,svg )',
        'post_image.dimensions'=>'Kích thước hình ảnh quá lớn ( hình ảnh phải bé hơn 10000 pixel )',
      ]
    );
    if($request->file('post_image')){
      $file= $request->file('post_image');
      $filename= date('dmyHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $image_name = $filename;
    }
    $category_id = isset($request->category_id) ? $request->category_id : [];
    $tags_id  = isset($request->tags) ? $request->tags : [];
    $status = isset($request->is_active) ? 1 : 0;
    $is_featured = isset($request->is_featured) ? 1 : 0;
    $post = new Post_news;
    $post->name = $request->name;
    $post->slug =  convert_text($request->name);
    $post->keyword =  !empty($request->keyword) ? $request->keyword :"";
    $post->summary = !empty($request->summary)? $request->summary :"";
    $post->image = $image_name;
    $post->content = !empty( $request->post_content)?  $request->post_content :"";
    $post->is_featured = $is_featured;
    $post->view_count = 0;
    $post->is_active = $status;
    $post->created_by = $user_ids;
    $post->updated_by = $user_ids;
    $post->save();
    $index = Post_news::where('slug', '=',$post->slug)->firstOrFail(); 
    if(count($category_id) > 0)
    {
      foreach($category_id as $cate_id)
      {
          $category_news = new Post_category_news;
          $category_news->post_id = $index->id;
          $category_news->category_id = $cate_id;
          $category_news->save();
         //echo $cate_id;
      }
    }
    if(count($tags_id) > 0)
    {
      foreach($tags_id as $tag_id)
      {
          $Post_tag_news = new Post_tag_news;
          $Post_tag_news->post_id = $index->id;
          $Post_tag_news->tag_id  = $tag_id;
          $Post_tag_news->save();
       
      }
    }
    return redirect()->back();
  }

  public function show()
  {
    return view('dashboard.post_news.show');
  }

  public function edit($id)
  {
    $index = Post_news::find($id);
    $category = Post_category::where( 'parent_id', '=', 0)->get();
    $allcategory = Post_category::pluck('name','id')->all();
    $tags = Post_tags::all();
    $cate_index = Post_category_news::where('post_id', '=', $id)->pluck('category_id')->toArray();
    $tags_index = Post_tag_news::where('post_id', '=', $id)->pluck('tag_id')->toArray();
    return view('dashboard.post_news.edit',compact('category','allcategory','tags','index','cate_index','tags_index'));
  }

  public function update(Request $request, $id)
  {
    $image_name ='';
    $user_ids = 1;
    $request->validate(
      [
        'name' => 'required|max:150',
        'slug' => 'max:150',
        'keyword' => '|max:200',
        'summary' => 'max:200',
        'post_image' => 'mimes:jpg,png,jpeg,gif,svg|dimensions:max_width=10000,max_height=10000',
      ],
      [
        'name.required'=>'Tiêu đề bài viết  không để trống',
        'name.max'=>'Dữ liệu tối đa 100 ký tự',
        'slug.max'=>'Dữ liệu tối đa 100 ký tự',
        'keyword.max'=>'Dữ liệu tối đa 200 ký tự',
        'summary.max'=>'Dữ liệu tối đa 200 ký tự',
        'post_image.mimes'=>'Định dạng sai ( hình ảnh phải là file jpg,png,jpeg,gif,svg )',
        'post_image.dimensions'=>'Kích thước hình ảnh quá lớn ( hình ảnh phải bé hơn 10000 pixel )',
      ]
    );
      if($request->file('post_image')){
      $file= $request->file('post_image');
      $filename= date('dmyHi').$file->getClientOriginalName();
      $file-> move(public_path('uploads'), $filename);
      $image_name = $filename;
    }
    $category_id = isset($request->category_id) ? $request->category_id : [];
    $tags_id  = isset($request->tags) ? $request->tags : [];
    $status = isset($request->is_active) ? 1 : 0;
    $is_featured = isset($request->is_featured) ? 1 : 0;
    
    $post =  Post_news::find($id);
    $post->name = $request->name;
    $post->slug =  $request->slug;
    $post->keyword =  !empty($request->keyword) ? $request->keyword :"";
    $post->summary = !empty($request->summary)? $request->summary :"";
    $post->image =    $image_name;
    $post->content = !empty( $request->post_content) ?  $request->post_content :"";
    $post->is_featured = $is_featured;
    $post->is_active =  $status;
    $post->created_by = $user_ids;
    $post->updated_by = $user_ids;
    $post->save();

    $cate_index = Post_category_news::where('post_id', '=', $id)->pluck('category_id')->toArray();
    $tags_index = Post_tag_news::where('post_id', '=', $id)->pluck('tag_id')->toArray();

    if(count($category_id) > 0)
    {
      foreach($category_id as $id_cate)
      {
        if(in_array($id_cate,$cate_index)==true){
          
          $indexw = Post_category_news::where('category_id', '=',$id_cate)->firstOrFail(); 
          $indexw->delete();
          $category_news = new Post_category_news;
          $category_news->post_id = $post->id;
          $category_news->category_id = $id_cate;
          $category_news->save();
        }
        else
        {
          $category_news = new Post_category_news;
          $category_news->post_id = $post->id;
          $category_news->category_id = $id_cate;
          $category_news->save();
        }
      }
    }

    if(count($tags_id) > 0)
    {
      foreach($tags_id as $tag_id)
      {

        if(in_array($tag_id,$tags_index) == true){
        
          $indext = Post_tag_news::where('tag_id', '=',$tag_id)->firstOrFail(); 
          $indext->delete();
          $Post_tag_news = new Post_tag_news;
          $Post_tag_news->post_id = $post->id;
          $Post_tag_news->tag_id  = $tag_id;
          $Post_tag_news->save();

        }
        else {

           $Post_tag_news = new Post_tag_news;
           $Post_tag_news->post_id = $post->id;
           $Post_tag_news->tag_id  = $tag_id;
           $Post_tag_news->save();

        }
      }
    }
   
   return redirect('dashboard/post-news/')->with('message','sửa dữ liệu thành công');
  }

  public function destroy(Request $request)
  {
    $id = $request->post_id;
    $category = Post_news::find($id);
    $category->delete();
    return 'xóa thành công';
  }

  function upstatus(Request $request) {
    $id = $request->id;
    $category = Post_news::find($id);
    $category->is_active = $request->status;
    $category->save();
    return 'update thành công';
  }

  function upfeatured(Request $request) {
    $id = $request->id;
    $post = Post_news::find($id);
    $post->is_featured = $request->is_featured;
    $post->save();
    return 'update thành công';
  }

}
