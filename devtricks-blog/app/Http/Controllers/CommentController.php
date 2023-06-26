<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Comment;

class CommentController extends Controller
{
    function list(){
        $list = Comment::paginate(1);
        return view('admin.comment.list',['data'=>$list]);
    }
    function upstatus(Request $request) {
        $id = $request->id;
        $comment = Comment::find($id);
        $comment->status = $request->status;
        $comment->save();
        return 'update thành công';
    }
    function trash(Request $request){
        $id = $request->post_id;
        $comment = Comment::find($id);
        $comment->delete();
        return 'xóa thành công';
    }
}
