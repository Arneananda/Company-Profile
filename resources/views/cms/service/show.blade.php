@extends('index')

@section('container')
<div class="container">
    <div class="">
        <nav class="navbar">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold">CMS Service</a>
              <a href="#"><img src="{{'asetes/img/logo.png' }}" alt="" style="border-radius:50%; width: 30px;"></a>
            </div>
          </nav>
    </div>
    <div class="container-fluid">
        <form style="padding-bottom: 20px;"  class="d-flex" role="search" action="/services">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"  value="{{ request('search') }}">
            <button type="submit" class="btn ml-3" style="background-color:#FF1F1F; --bs-btn-font-size: .70rem; --bs-btn-padding-x: 1rem; color:#F5F5F5; margin-right:6px;">Search</button>
            {{-- <a href="/add-service" type="button" class="btn btn-outline me-2" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600; color:#FF1F1F;">New Team</a> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600;background-color:white ; color:#FF1F1F;">
               New Service
              </button>
        </form>
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content"  style="height:500px; width:800px; position: relative; left:-20%;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Service</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer" style="display: flex; flex-direction: column; ">
                    <form action="/add-service" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="name" style="margin-bottom: 10px"><label for="service">Service Name</label>
                        <input type="text" value="{{ old('service') }}" class ="@error('service') is-invalid @enderror"name="service" id="service" placeholder="Enter Service Name"  autocomplete="off"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                    <div class="invalid-feedback">
                    @error('service')
                        {{ $message }}
                    @enderror    
                    </div>        
                </div>
                <div class="desk"  style="margin-bottom: 20px">
                    <label for="description">Deskripsi Service</label>
                    <input type="text"value='{{  old('description')}}' name="description" class ="@error('description') is-invalid @enderror" id="description" placeholder="Enter Service Description"  autocomplete="off"   style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px"> 
                    <div class="invalid-feedback">
                        @error('description')
                            {{ $message }}
                        @enderror    
                        </div>  
                </div>
                <div class="image">
                   <label for="icon">Icon*</label>
                    <input type="file"value="{{ old('icon') }}" name="icon" class ="@error('icon') is-invalid @enderror"id="icon" onchange="previewImage()"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                    <div class="invalid-feedback">
                        @error('icon')
                            {{ $message }}
                        @enderror    
                        </div> 
                </div>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:45%; top:85%; ">Simpan</button>
          
                    </form>
                    
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="bg-white rounded-3 p-3" style="overflow: hidden; height:100vh; margin-left: 13px">
        <table class="table table-hover" style="background-color: #F5F5F5;">
           
            @if ($services->count() == 0)
            <h1 style="font-weight: 700;position: relative;left:35%; color:#b6b6b6;" >Data Not Found</h1>       
       @else 
       <thead>
                <tr >
                    <th style="color: #b6b6b6; font-weight:500; font-size:10px">Title</th>
                    <th style="color: #b6b6b6; font-weight:500; font-size:10px">Description</th>
                    <th style="color: #b6b6b6; font-weight:500; font-size:10px">Icon</th>
                    <th style="color: #b6b6b6; font-weight:500; font-size:10px">Action</th>
                </tr>
            </thead>
            <tbody>
           
                @foreach ($services as $service)
                <tr>
                <td>{{ $service->service }}</td>
                <td>{{ $service->description }}</td>
                <td><img src="{{ asset('storage/'. $service->icon) }}" alt="" width="70px" height="70px"></td>
                
                <td style="display: flex;flex-direction: row; padding:26px  10px;"> 
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: red;border:none;font-size:13px;margin-right:3px;">
                        Hapus
                    </button>
                        <form action="/del-service/{{ $service->id }}" method="post">@csrf @method('delete')
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


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $service->id }}" style="background-color:white;border:1px solid red; color:red; font-size:13px;">
               Edit
              </button>        
              <div class="modal fade" id="updateModal{{ $service->id }}" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content"  style="height:500px; width:800px; position: relative; left:-20%;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Form Team</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <form action="/update-service/{{ $service->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="name" style="margin-bottom: 10px"><label for="service">Service Name</label>
                        <input type="text" name="service" id="service" placeholder="service"  autocomplete="off"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px" value="{{ $service->service }}">
                    </div>
                    <div class="desk"  style="margin-bottom: 20px">
                        <label for="description">Deskripsi Service</label>
                        <input type="text" name="description" id="description" placeholder="deskripsi"  autocomplete="off"   style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8pxs" value="{{  $service->description }}"> 
                    </div>
                    <div class="image">
                        <img src="" alt="" class="img-fluid">
                        <input type="file" name="icon" id="icon" onchange="previewImage()"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                        <input type="hidden" name="oldImage" id="" value="{{ $service->icon }}">
                    </div>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:45%; top:85%; ">Simpan</button>
                        </form>
                        
                    </div>
                  </div>
                </div>
              </div>
              </td>
            </tr>
            <script>
                function previewImage(){
                    const img = document.querySelector('#icon');
                }
              
            </script>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection