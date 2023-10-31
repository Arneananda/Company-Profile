<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(){
        return view('cms.team.add');
    }
    public function store(Request $request){
        $ValidatedData = $request->validate([
            'name' => 'required|max:255',
            'job_title' => 'required|max:255|min:3',
            'image' => 'required|image|file|max:1024'
        ]);
     
            $ValidatedData['image'] = $request->file('image')->store('team-images');
        

        if($request->has('action')){
            $action = $request->input('action');
            if($action === 'save'){
                $ValidatedData ['status'] = 'unpublished';
                Team::create($ValidatedData);
            }           
            elseif($action === 'publish') {
                $ValidatedData ['status'] = 'published';
                Team::create($ValidatedData);
            }{

            } 
        }


        return redirect('/teams')->with('success','Data berhasil ditambahkan');
    }
    public function show(){
        $teams = Team::latest();
        if(request('search')){
            $teams->where('name','LIKE','%'.request('search').'%')
            ->orWhere('job_title','LIKE','%'.request('search').'%');
        }
        $teams->get();
        return view('cms.team.show',[
            'teams' => $teams->paginate(6),
            'z' => 0.75,
            'tl' => 'team'
        ]);
    }
    public function update(Request $request,Team $team){
        $validate = $request->validate([
            'name' => 'required|max:255',
            'job_title' => 'required|max:255',
            'image' => 'image|file|max:2048'
        ]);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('team-images');
        }
                Team::where('id',$team->id)
                        ->update($validate);
        
        return redirect('/teams')->with('upd',"Data team berhasil diedit");
    }
   
    public function destroy(Team $team){
        if($team->image){
            Storage::delete($team->image);
        }
        Team::destroy($team->id);
        return redirect('/teams')->with('del','Data team berhasil dihapus');
    }
    public function publish(Team $team){
        Team::where('id',$team->id)->update(['status' => 'published']);
        return redirect('/teams')->with('success','Data Published');
    }
    public function unpublish(Team $team){
        Team::where('id',$team->id)->update(['status' => 'unpublished']);
        return redirect('/teams')->with('success','Data Unpublished');
    }
}
