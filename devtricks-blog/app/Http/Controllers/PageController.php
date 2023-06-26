<?php

namespace App\Http\Controllers;
use App\models\Menu;
use App\models\News;
use App\models\Category;
use App\models\Contact;
use App\models\Comment;
use App\models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    function home(){
        $single = News::where(['status'=>1])->orderBy('created_at', 'desc')->take(1)->get();
        $list = news::where(['status'=>1])->inRandomOrder()->take(3)->get();
        $category = News::where(['status'=>1])->paginate(5);
        return view('page.home',['data'=>$list,'top_new'=>$single,'category'=>$category]);
    }
    function about(){
        $index = News::find(2);
        return view('page.about',['index'=>$index]);
    }
    function category($id,$slug){
        $list = News::where(['status'=>1,'category_id'=>$id])->paginate(5);
        return view('page.category',['data'=>$list]);
    }
    function detail($id,$slug){
        $views = news::where(['status'=>1])->orderBy('views', 'desc')->get();
        $index = News::where('id', $id)->first();
        $index->views = $index->views +1;
        $index->save();
        return view('page.detail',['index'=>$index,'list'=>$views]);
    }
    function profile(){
        return view('page.profile');
    }
    function search(Request $request){
        $result = $request->txtresult;
        $data['keyword'] = $result;
        $result = str_replace(' ','%',$result);
        $data['list'] =  News::where('title','like','%'.$result.'%')->paginate(8);
        return view('page.search',$data);
    }
}
