<?php

namespace App\Http\Controllers;

use DemeterChain\C;
use Illuminate\Http\Request;
use App\models\Contact;

class ContactController extends Controller
{
    function list(){
        $list = Contact::paginate(5);
        return view('admin.contact.list',['data'=>$list]);
    }
    function upstatus(Request $request) {
        $id = $request->id;
        $contact = Contact::find($id);
        $contact->status = $request->status;
        $contact->save();
        return 'update thành công';
    }
    function trash(Request $request){
        $id = $request->post_id;
        $contact = Contact::find($id);
        $contact->delete();
        return 'xóa thành công';
    }
}
