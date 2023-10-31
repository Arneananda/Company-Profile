<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Models\custpart;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class PortoController extends Controller
{
    public function index(){
       
        
        return view('cms.portofolio.add',[
            'services'=> Service::all()
        ]);
    }
    public function add(Request $request){
        
        $ValidatedData = $request->validate([
            'project_name' => 'required|max:255',
            'client' => 'required|max:255',
            'cover' => 'required|image|file|max:2048',
            'service' => 'required',
            'description' => 'nullable',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'nullable'
        ]);
        if($request->status){
            $ValidatedData['status'] = 'OnGoing';
            $ValidatedData['waktu_selesai'] = null;
        }else{
            $ValidatedData['status'] ='Finished';
        }
      
        $ValidatedData['cover'] = $request->file('cover')->store('porto-cover');
        Portofolio::create($ValidatedData);

        return redirect('/porto')->with('success','Data portofolio berhasil ditambahkan');
    }
    public function show(){
        $port = Portofolio::latest();
        if(request('search')){
            $port->where('project_name','LIKE','%'.request('search').'%')
            ->orWhere('client','LIKE','%'.request('search').'%')
            ->orWhere('service','LIKE','%'.request('search').'%')
            ->orWhere('description','LIKE','%'.request('search').'%');
        }
        $port->get();
        return view('cms.portofolio.show',[
            'projects' => $port->paginate(6),
            'services' => Service::all(),
            'z' => 0.75,
            'tl' => 'porto'
        ]);
    }
    public function destroy(Portofolio $portofolio){
        if($portofolio->cover){
            Storage::delete($portofolio->cover);
        }
        Portofolio::destroy($portofolio->id);
        return redirect('/porto')->with('del','Data portofolio berhasil dihapus');
    }
    public function uindex(Portofolio $portofolio){
        return view('cms.portofolio.update',[
            'portofolio' => $portofolio,
            'services' => Service::all(),
            'z' => 0.67,
            'tl' => 'porto'
            
        ]);
    }
    public function update(Request $request,Portofolio $portofolio){
        $validate = $request->validate([
            'project_name' => 'required|max:255',
            'client' => 'required|max:255',
            'cover' => 'image|file|max:2048',
            'service' => 'required',
            'description' => 'nullable',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'nullable'
           
        ]);

        if($request->file('cover')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['cover'] = $request->file('cover')->store('porto-cover');
        }
        if($request->status){
            $ValidatedData['status'] = 'OnGoing';
            $ValidatedData['waktu_selesai'] = null;
        }else{
            $ValidatedData['status'] ='Finished';
        }
        Portofolio::where('id' , $portofolio->id)->update($validate);

        return redirect('/porto')->with('upd','Data portofolio berhasil diedit');
    }
   
}
