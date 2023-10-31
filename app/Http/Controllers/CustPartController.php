<?php

namespace App\Http\Controllers;

use App\Models\custpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustPartController extends Controller
{
    public function index(){
        return view('cms.cust-part.add');
    }
    public function add(Request $request){
        $ValidatedData = $request->validate([
            "company_name" => 'required|max:255',
            "type" => 'required',
            'image' => 'required|image|file|max:2048'
        ]);
            $ValidatedData['image'] = $request->file('image')->store('co-images');
     
        custpart::create($ValidatedData);

        return redirect('/customer-partner')->with('success','Data succesly saved');
         
    }
    public function show(){
        $cp = custpart::latest();
        if(request('search')){
            $cp->where('company_name','LIKE','%'.request('search').'%')
            ->orWhere('type','LIKE','%'.request('search').'%');
        }
        $cp->get();
        return view('cms.cust-part.show',[
           'custs' =>  $cp->paginate(6),
           'z' => 0.75,
           'tl' => 'custpart'
        ]);
    }
    public function detail(custpart $custpart){
        return view('cms.cust-part.client',[
            'custpart' => $custpart
        ]);
    }
    public function destroy(custpart $custpart){
        Storage::delete($custpart->image);
        custpart::destroy($custpart->id);
        return redirect('/customer-partner')->with('del','Data Succesly Deleted');
    }
    public function undex(custpart $custpart){
        return view('cms.cust-part.update',[
            'custpart' => $custpart
        ]);
    }
    public function update(Request $request,custpart $custpart  ){
        $validate = $request->validate([
                   "company_name"=>'required|max :191 ',
                   "type" => 'required',
                   'image' => 'image|file|max:2048'
        ]);
        if($request->file('image')){
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
            $validate ["image"] = $request->file("image")->store("co-images");
        } 
        custpart::where('id' ,$custpart->id)->update($validate);

        return redirect('/custpart')->with('upd','Data has been updated');
    }
}
