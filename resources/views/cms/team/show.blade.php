@extends('index')

@section('container')
@include('partial.style')
{{-- <form action="/teams">
    <input type="text" name="search" id="search" value="{{ request('search') }}">
    <button type="submit">Search</button>
    </form>
<table>
    <tr>
        <th>Nama</th>
        <th>Job Title</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
@foreach ($teams as $team)
    <tr>
        <td>{{ $team->name }}</td>
        <td>{{ $team->job_title }}</td>
        <td><img src="{{ asset('storage/' . $team->image) }}" alt="" width="100px"></td>
        <td><form action="/des/{{ $team->id }}" method="post">@csrf @method('delete')
        <button type="submit">Hapus</button></form>
        <a href="/update-team/{{ $team->id }}">Edit</a>
        @if ($team->status == 'unpublished')
        <form action="publish-team/{{ $team->id }}" method="post">@csrf
        <button type="submit">Publish</button>
        </form>
        @elseif ($team->status == 'published')
        <form action="unpublish-team/{{ $team->id }}" method="post">@csrf
            <button type="submit">Unpublish</button>
            </form>
        @endif</td>
       
    </tr>
@endforeach
</table>     --}}
<div class="container">
    <div class="">
        <nav class="navbar">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold">CMS Team</a>
              <a href="#"><img src="{{'asetes/img/logo.png' }}" alt="" style="border-radius:50%; width: 30px;"></a>
            </div>
          </nav>
    </div>
<div class="container-fluid">

    <form style="padding-bottom: 20px;"  class="d-flex" role="search" action="/teams">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"  value="{{ request('search') }}">
        <button type="submit" class="btn ml-3" style="background-color:#FF1F1F; --bs-btn-font-size: .70rem; --bs-btn-padding-x: 1rem; color:#F5F5F5; margin-right:6px;">Search</button>
        {{-- <a href="/add-team" type="button" class="btn btn-outline me-2" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600; color:#FF1F1F;">New Team</a> --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600;background-color:white ; color:#FF1F1F;">
            New Team
           </button>
    </form>
</div>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"  style="height:500px; width:800px; position: relative; left:-20%;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Team</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <form action="/add-team" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">Nama*</label>
            <input type="text" name="name" id="name" placeholder="Enter name"  autocomplete="off" class="@error('name') is-invalid @enderror"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="job_title">Job Title* </label>
            <input type="text" name="job_title" id="job_title" placeholder="Enter Job Title"  autocomplete="off" class="@error('job_title') is-invalid @enderror"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
             @error('job_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="image">Photo*</label>
            <input type="file" name="image" id="image"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
           
            <button type="submit"  name="action" value="save" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:48%; top:85%; ">Simpan</button>
            <button type="submit" name="action" value="publish" class="btn btn-primary" data-bs-toggle="modal" style="background-color: white;color:red;border:1px solid red; position:absolute; left:37%; top:85%; ">Publish</button>
            </form>
            
        </div>
      </div>
    </div>
  </div>
<div class="bg-white rounded-3 p-3" style="overflow: hidden; height:100vh; margin-left: 13px">
    <table class="table table-hover" style="background-color: #F5F5F5;">
        @if ($teams->count() == 0)
            <h1 style="font-weight: 700;position: relative;left:35%; color:#b6b6b6;" >Data Not Found</h1>       
       @else 
        <thead>
           
            <tr >
                <th style="color: #b6b6b6; font-weight:400;">Name</th>
                <th style="color: #b6b6b6; font-weight:400;">Job Title</th>
                <th style="color: #b6b6b6; font-weight:400;">Photo</th>
                <th style="color: #b6b6b6; font-weight:400;">Status</th>
                <th style="color: #b6b6b6; font-weight:400;">Action</th>
            </tr>
        </thead>
        <tbody>
            {{ $teams->links() }}
            @foreach ($teams as $team)
    <tr>
        <td>{{ $team->name }}</td>
        <td>{{ $team->job_title }}</td>
        <td><img src="{{ asset('storage/' . $team->image) }}" alt="ini Photo"width="60px" height="80px"></td>
        <td> @if ($team->status == 'unpublished')
            <form action="publish-team/{{ $team->id }}" method="post">@csrf
            <button type="submit" style="border: 0.7px solid #FF4C4C; background-color: white;border-radius: 8px; color:#FF4C4C;">Unpublish</button>
            </form>
            @elseif ($team->status == 'published')
            <form action="unpublish-team/{{ $team->id }}" method="post">@csrf
                <button type="submit" style="border: 0.7px solid #20C805; background-color: white;color:#20C805; border-radius:8px;">Published</button>
                </form>
            @endif</td></td>
            <td style="display: flex;flex-direction: row; padding:32px  10px;"> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: red;border:none;font-size:13px;margin-right:3px;">
                    Hapus
                </button>
            <form action="/del-team/{{ $team->id }}" method="post">@csrf @method('delete')
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" style="width:230px;height:140px;border-radius: 12px;display:flex;flex-direction: column;justify-content: center;align-items: center;position:relative;top:280px;right:-120px; ">
                          <h5 class="modal-title" id="exampleModalLabel" style="font-size: 14px;font-weight: 700;line-height: 16.94px;margin-bottom:10px;padding:0px 10px;text-align: center;box-sizing: border-box;">Are you sure want to delete this?</h5>
                          <div class="btn" style="display: flex;flex-direction: row;width:150px; justify-content:space-between;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border:1px solid #FF1F1F; background-color: white;color:#FF1F1F; border-radius: 8px;font-size:12px;font-weight: 500;width:55px;height:50px;">No</button>
                                <button type="submit" class="btn btn-primary" style="background-color: #FF1F1F;color:white;border:none; border-radius: 8px;font-size:12px;font-weight: 500;width:55px;height:50px;" >Yes</button>
                          </div>
                      </div>
                    </div>
                </div></form>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $team->id }}" style="background-color: white;border:1px solid red;font-size: 13px;color:red;">
               Edit
              </button>
              <div class="modal fade" id="updateModal{{ $team->id }}" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content"  style="height:500px; width:800px; position: relative; left:-20%;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Form Team</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <form action="/update-team/{{ $team->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Nama*</label>
                            <input type="text" name="name" id="name" value="{{ $team->name }}"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                            <label for="job_title">Job Title* </label>
                            <input type="text" name="job_title" id="job_title" value="{{ $team->job_title }}"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                            <label for="image">Photo*</label>
                            <div class="preview">
                                <img src="" alt="">
                            <input type="file" name="image" id="image" onchange=""  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">

                        </div>
                            <input type="hidden" name="oldImage" id="oldImage" value="{{ $team->image }}">
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:45%; top:85%; ">Simpan</button>

                        </form>
                        
                    </div>
                  </div>
                </div>
              </div>
       
    </tr>
@endforeach
@endif
        </tbody>
    </table>
</div>
</div>
@endsection
