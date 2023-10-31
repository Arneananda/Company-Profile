@extends('index')

@section('container')
{{-- <form action="/porto">
<input type="text" name="search" id="search" value="{{ request('search') }}">
<button type="submit">Cari</button>
</form>
<table>
    <tr>
        <th>Nama Project</th>
        <th>Customer</th>
        <th>Service</th>
        <th>Deskripsi</th>
        <th>Waktu Mulai</th>
        <th>Waktu Selesai</th>
        <th>Cover</th>
        <th>Aksi</th>
    </tr>
@foreach ($projects as $project)
    <tr>
        <td>{{ $project->project_name }}</td>
      <td>{{ $project->client }}</td>
      <td>{{ $project->service }}</td>
      <td>{{ $project->description }}</td>
        <td>{{ $project->waktu_mulai }}</td>
        <td>{{ $project->waktu_selesai }}</td>
        <td><img src="{{ asset('storage/' . $project->cover) }}" alt="" width="100px"></td>
        <td><form action="/del/{{ $project->id }}" method="post">
        @csrf @method('delete')
    <button type="submit">Hapus</button></form>
    <a href="/update-porto/{{ $project->id }}">Edit</a></td>
  
    </tr>
@endforeach
</table> --}}
<div class="container">
    <div class="">
        <nav class="navbar">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold">CMS Portfolio</a>
              <a href="#"><img src="{{'asetes/img/logo.png' }}" alt="" style="border-radius:50%; width: 30px;"></a>
            </div>
          </nav>
    </div>
<div class="container-fluid">
    <form style="padding-bottom: 20px;"  class="d-flex" role="search" action="/porto">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"  value="{{ request('search') }}">
        <button type="submit" class="btn ml-3" style="background-color:#FF1F1F; --bs-btn-font-size: .70rem; --bs-btn-padding-x: 1rem; color:#F5F5F5; margin-right:6px;">Search</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600;background-color:white ; color:#FF1F1F;">
            New Portofolio
        </button>
    </form>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content"  style="height:700px; width:800px; position: relative; left:-20%;">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Portofolio</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer" style="display: flex;flex-direction: column">
                <form action="/add-porto" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="pn">Project Name*</label>
                <input type="text" name="project_name" placeholder="Enter Project Name" value='{{ old('project_name') }}' class = '@error('project_name') is-invalid @enderror' id="pn"  autocomplete="off"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                @error('project_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror    
                <label for="ct">Client*</label>
                <input type="text"value='{{ old('client') }}' placeholder="Enter Client" name="client" class = '@error('client') is-invalid @enderror' id="ct"  autocomplete='off'  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px"'>
                @error('client')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror  
                <label for="cover">Cover*</label>
                <input type="file" name="cover" id="cover" value = '{{ old('cover') }}'class = '@error('cover') is-invalid @enderror' style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label for="sv">Service*</label>
                <select name="service" id="sv"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                   @foreach ($services as $service)
                    <option value="{{ $service->service }}">{{ $service->service }}</option>       
                   @endforeach
                </select>
                <label for="des">Description</label>
                <input type="text" name="description" placeholder="Enter Description"  value="{{ old('description') }}" class = '@error('description') is-invalid @enderror' id="des"  autocomplete="off"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="og" style="display: flex;flex-direction: row;"> <input type="checkbox" name="status[]" id="disableInput" value="OnGoing"  style="margin-right:6px ;"><label for="disableInput">This is a rapier project at the moment??</label></div>
                <label for="waktu_mulai">Start Date</label>
                <input type="date" name="waktu_mulai" id="waktu_mulai"   style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                <div id="we" class="we" style="display: block"><label for="waktu_selesai">End Date</label>
                <input type="date" name="waktu_selesai" id="waktu_selesai"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
            </div>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:45%; top:85%; ">Simpan</button>

                <script>
                    const checkbox = document.getElementById('disableInput');
                    const inputElement = document.getElementById('waktu_selesai');
                    const we = document.getElementById('we');
                    
                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            inputElement.style.display = 'none'; 
                            we.style.display = 'none';// Menonaktifkan input saat checkbox diceklik
                        } else {
                            we.style.display = 'block';
                            inputElement.style.display = 'block'; // Mengaktifkan input saat checkbox tidak diceklik
                        }
                    });
                </script>
                </form>
                
            </div>
          </div>
        </div>
      </div>
</div>
<div class="bg-white rounded-3 p-3" style="overflow: hidden; height:100vh; margin-left: 13px">
    <table class="table table-hover" style="background-color: #F5F5F5;">
        @if ($projects->count() == 0)
        <h1 style="font-weight: 700;position: relative;left:35%; color:#b6b6b6;" >Data Not Found</h1>       
   @else 
        <thead>
            <tr >
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Project Name</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Client</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Service</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Status</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Start Date</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">End Date</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Description</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Cover</th>
                <th style="color: #b6b6b6; font-weight:500; font-size:12px">Action</th>
            </tr>
        </thead>
        <tbody>
            {{ $projects->links() }}
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->project_name }}</td>
              <td>{{ $project->client }}</td>
              <td>{{ $project->service }}</td>
              <td>{{ $project->status }}</td>
                <td>{{  date('Y-m-d', strtotime($project->waktu_mulai)) }}</td>
                <td>{{  $project->waktu_selesai ? date('Y-m-d', strtotime($project->waktu_mulai)) : '-' }} </td>
                <td>{{ $project->description }}</td>
                <td><img src="{{ asset('storage/' . $project->cover) }}" alt="" width="80px" height="60px"></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: red;border:none;font-size:13px;">
                    Hapus
                  </button>
                    <form action="/del/{{ $project->id }}" method="post">
                @csrf @method('delete')
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
                </div>
                    </form>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $project->id }}" style="background-color: white;border:1px solid #FF1F1F;color:#FF1F1F;font-size: 13px;">
                   <a href="update-porto/{{ $project->id }}" style="text-decoration: none;color:#FF1F1F;">Edit</a>
                  </button> 
                  
                    
                  </td>
          
            </tr>
        @endforeach
             @endif    
            </tbody>
        </table>
    </div>   
</div>
@endsection
