<?php

namespace App\Http\Controllers;
use App\models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function list(){
        $list = Menu::paginate(5);
        return view('admin.menu.list',['data'=>$list]);
    }
    function add(){
        $list = Menu::all()->toArray();
        return view('admin.menu.add',['data'=>$list]);
    }
    function postadd(Request $request){
        $this->validate($request,[
            'name'=>'required|max:100|unique:menu',
            'url'=>'max:150',
            'parent'=>'max:10',
            'order'=>'required|max:10',
        ],
        [
            'name.required'=> 'Tên menu là bắt buộc',
            'name.max'=> 'Tên  menu không quá 100 ký tự',
            'name.unique'=> 'Tên menu đã tồn tại',
            'url.max'=> 'Dường dẫn menu không quá 150 ký tự',
            'parent.max'=> 'Parent không quá 10 ký tự',
            'order.required'=> 'Thứ tự là bắt buộc',
            'order.max'=> 'Thứ tự không quá 10 ký tự',
            'order.numeric'=> 'Thứ tự phải là số',
        ]);
        $status = isset($request->status) ? 1 : 0;
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->parent = $request->parent;
        $menu->order = $request->order;
        $menu->status = $status;
        $menu->save();
        return redirect('admin/menu/add')->with('message','thêm dữ liệu thành công');
    }
    function update($id){
        $list = Menu::all()->toArray();
        $index = Menu::find($id);
        return view('admin.menu.edit',['index'=>$index,'data'=>$list]);
    }
    function postupdate(Request $request,$id){

        $this->validate($request,[
            'name'=>'required|max:100|unique:menu',
            'url'=>'max:150',
            'parent'=>'max:10',
            'order'=>'required|max:10|numeric',
        ],
            [
            'name.required'=> 'Tên menu là bắt buộc',
            'name.max'=> 'Tên  menu không quá 100 ký tự',
            'name.unique'=> 'Tên menu đã tồn tại',
            'url.max'=> 'Dường dẫn menu không quá 100 ký tự',
            'parent.max'=> 'Parent không quá 10 ký tự',
            'order.required'=> 'Thứ tự là bắt buộc',
            'order.max'=> 'Thứ tự không quá 10 ký tự',
            'order.numeric'=> 'Thứ tự phải là số',
        ]);
        $status = isset($request->status) ? 1 : 0;

        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->parent = $request->parent;
        $menu->order = $request->order;
        $menu->status = $status;
        $menu->save();
        return redirect('admin/menu/list')->with('message','cập nhật dữ liệu thành công');
    }
    function upstatus(Request $request) {
        $id = $request->id;
        $menu = Menu::find($id);
        $menu->status = $request->status;
        $menu->save();
        return 'update thành công';
    }
    function trash(Request $request){
        $id = $request->post_id;
        $menu = Menu::find($id);
        $menu->delete();
        return 'xóa thành công';
    }
}
