<?php

namespace App\Http\Controllers;

use App\Models\Post_tags;
use Illuminate\Http\Request;

class Post_tagsController extends Controller
{

  public function index()
  {
    $list = Post_tags::paginate(10);
    return view('dashboard.post_tags.index',['data'=>$list]);
  }

  public function store(Request $request)
  {
    $user_ids = 1;
    $request->validate([
      'name' => 'required|unique:Post_tags|max:70',
    ],
    [
      'name.required'=>'Tên danh mục không để trống',
      'name.unique'=>'Tên danh mục đã tồn tại, không ươợc trùng',
      'name.max'=>'Dữ liệu tối đa 100 ký tự',
    ]);
    $post_tags = new Post_tags;
    $post_tags->name = $request->name;
    $post_tags->updated_by = $user_ids;
    try {
      $post_tags->save();
    } catch (ModelNotFoundException $exception) {
      return back()->withError($exception->getMessage())->withInput();
    }
    return redirect()->back();
  }

  public function edit($id)
  {
    $tag = Post_tags::find($id);
    return view('dashboard.post_tags.edit',[
      'index'=>$tag,
    ]);
  }

  public function update(Request $request, $id)
  {
    $image_name ='';
    $user_ids = 1;
    $request->validate([
      'name' => 'required|max:100',
    ],
      [
        'name.required'=>'Tên danh mục không để trống',
        'name.max'=>'Dữ liệu tối đa 100 ký tự',
      ]);
      $tags = Post_tags::find($id);
      $tags->name = $request->name;
      $tags->updated_by = $user_ids;
      try {
        $tags->save();
      } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
      }
      return redirect('dashboard/post-tags/')->with('message','thêm dữ liệu thành công');
  }


  public function destroy(Request $request)
  {
    $id = $request->post_id;
    $tag = Post_tags::find($id);
    $tag->delete();
    return 'xóa thành công';
  }
}
