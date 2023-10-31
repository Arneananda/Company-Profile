<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(){
        return view('cms.link.show',[
        'links' => Link::all(),
        'z' => 0.80,
        'tl' => 'link'
        ]);//        
    }
    public function update(Request $request,Link $link){
        $validate = $request->validate([
            'link' => 'required'
        ]);
        Link::where('id',$link->id)->update(['link' => $validate['link']]);
        return redirect('/links')->with('upd','Data has been updated');
    }


    public function uindex(Link $link){
        return view('cms.link.edit',[
            'link' => $link
        ]);
    }

}
