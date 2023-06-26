<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\News;
use App\models\Users;
use App\models\Comment;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function list(){
        $list = News::paginate(5);
        return view('admin.news.list',['data'=>$list]);
    }
    function add(){
        $category = Category::all();
        return view('admin.news.add',['category'=>$category]);
    }
    function postadd(Request $request){
        $this->validate($request,[
            'title'=>'required|max:150|unique:news',
            'slug_name'=>'max:150',
            'summary'=>'max:350',
            'keyword'=>'max:150',
            'description'=>'max:170',
            'image' => 'mimes:jpeg,jpg,png|max:3000000',
            'images_list.*' => 'mimes:jpeg,jpg,png',
        ],[
            'name.required'=> 'Tiêu đề là bắt buộc',
            'name.max'=> 'Tiêu đề không quá 150 ký tự',
            'name.unique'=> 'Bài viết đã tồn tại',
            'slug_name.max'=> 'Slug thể loại không quá 100 ký tự',
            'summary.max'=> 'Tóm tắt không quá 350 ký tự',
            'keyword.max'=> 'Từ khóa không quá 150 ký tự',
            'description.max'=> 'Miêu tả không quá 170 ký tự',
            'image.mimes'=> 'Định dạng hình ảnh không hợp lệ',
            'image.max'=>'Kích thước file quá lớn',
            'images_list.*.mimes'=> 'Định dạng hình ảnh không hợp lệ',
        ]);
         $name ='';
         $data =[];
        if ($request->hasFile('image')) {
            $images = $request->image;
            $name = $images->getClientOriginalName();
            $images->move('public/upload', $name);
        }
        if ($request->hasFile('images_list')) {
            foreach($request->file('images_list') as $list_imgaes)
            {
                $list=$list_imgaes->getClientOriginalName();
                $list_imgaes->move(public_path().'/public/upload/gallery/', $list);
                $data[] = $list;
            }
        }

        $status = isset($request->status) ? 1 : 0;
        $news = new News;
        $news->title = $request->title;
        $news->slug = !empty($request->slug_name) ? $request->slug_name : changeTitle($request->title);
        $news->summary = $request->summary;
        $news->images = $name;
        $news->images_list = !empty($data) ? json_encode($data) : '';
        $news->content = !empty($request->contents)? $request->contents :"";
        $news->category_id  = $request->category;
        $news->user_id  = 1;
        $news->keyword = !empty($request->keyword)? $request->keyword :"";
        $news->descriptions = !empty($request->description)? $request->description :"";
        $news->status = $status;
        $news->save();
        return redirect('admin/news/add')->with('message','thêm dữ liệu thành công');
    }
    function update($id){
        $category = Category::all();
        $index = News::find($id);
        return view('admin.news.edit',['index'=>$index,'category'=>$category]);
    }
    function postupdate(Request $request,$id){

        $this->validate($request,[
            'title'=>'required|max:150|unique:news',
            'slug_name'=>'max:150',
            'summary'=>'max:350',
            'keyword'=>'max:150',
            'description'=>'max:170',
            'image' => 'mimes:jpeg,jpg,png|max:3000000',
            'images_list.*' => 'mimes:jpeg,jpg,png',
        ],[
            'name.required'=> 'Tiêu đề là bắt buộc',
            'name.max'=> 'Tiêu đề không quá 150 ký tự',
            'name.unique'=> 'Bài viết đã tồn tại',
            'slug_name.max'=> 'Slug thể loại không quá 100 ký tự',
            'summary.max'=> 'Tóm tắt không quá 350 ký tự',
            'keyword.max'=> 'Từ khóa không quá 150 ký tự',
            'description.max'=> 'Miêu tả không quá 170 ký tự',
            'image.mimes'=> 'Định dạng hình ảnh không hợp lệ',
            'image.max'=>'Kích thước file quá lớn',
            'images_list.*.mimes'=> 'Định dạng hình ảnh không hợp lệ',
        ]);
        $name ='';
        $data =[];
        if ($request->hasFile('image')) {
            $images = $request->image;
            $name = $images->getClientOriginalName();
            $images->move('public/upload', $name);
        }
        if ($request->hasFile('images_list')) {
            foreach($request->file('images_list') as $list_imgaes)
            {
                $list=$list_imgaes->getClientOriginalName();
                $list_imgaes->move(public_path().'/public/upload/gallery/', $list);
                $data[] = $list;
            }
        }
        $status = isset($request->checkbox) ? 1 : 0;

        $news = News::find($id);
        $news->title = $request->title;
        $news->slug = !empty($request->slug_name) ? $request->slug_name : changeTitle($request->title);
        $news->summary = $request->summary;
        $news->images = $name;
        $news->images_list = !empty($data) ? json_encode($data) : '';
        $news->content = !empty($request->contents)? $request->contents :"";
        $news->category_id  = $request->category;
        $news->user_id  = 1;
        $news->keyword = !empty($request->keyword)? $request->keyword :"";
        $news->descriptions = !empty($request->description)? $request->description :"";
        $news->status = $status;
        $news->save();
        return redirect('admin/news/list')->with('message','thêm dữ liệu thành công');
    }
    function upstatus(Request $request) {
        $id = $request->id;
        $news = News::find($id);
        $news->status = $request->status;
        $news->save();
        return 'update thành công';
    }
    function trash(Request $request){
        $id = $request->post_id;
        $news = News::find($id);
        $news->delete();
        return 'xóa thành công';
    }
}
