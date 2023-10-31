<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\search;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::latest();
        if(request('search')){
            $services->where('service','LIKE','%'.request('search').'%')
            ->orWhere('description','LIKE','%'.request('search').'%');
        }
        
        return view('cms.service.show',[

            'services' => $services->get(),
            'z' => 0.75,
            'tl' => 'serv'
        ]);
    }
    public function add(){
        return view('cms.service.add');
    }
    public function store(Request $request){
        $validate = $request->validate([
            'service' => 'required|max:255',
            'description' => 'required',
            'icon' => 'required|file|image|max:2048'
        ]);
            $validate['icon'] = $request->file('icon')->store('service-icon');
       
        Service::create($validate);
        return redirect('/services')->with('sucess','Data berhasil ditambahkan');
    }
    public function destroy(Service $service){
        if($service->image){
            Storage::delete($service->image);
        }
        Service::destroy($service->id);
        return redirect('/services')->with('del','Data berhasil dihapus');
    }
    public function update(Request $request,Service $service){
        
        $validate = $request->validate([
            'service' => 'required|max:255',
            
        ]);
        if($request->file('icon')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['icon'] = $request->file('icon')->store('service-icon');
        }
                Service::where('id',$service->id)
                        ->update($validate);
        
        return redirect('/services')->with('upd',"Data berhasil diedit");
    }
    public function uindex(Service $service){
        return view('cms.service.update',[
            "service" => $service
        ]);
    }
    }

