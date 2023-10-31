@extends('index')

@section('container')
<style>
    body{
        overflow-x:scroll;
    }
</style>


        <div class="container">
            <div class="">
                <nav class="navbar">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold">CMS Portfolio</a>
                        <a href="#"><img src="{{ 'asetes/img/logo.png' }}" alt=""
                                style="border-radius:50%; width: 30px;"></a>
                    </div>
                </nav>
            </div>
            <form method="POST" action="/update-porto/{{ $portofolio->id }}" enctype="multipart/form-data">
                @csrf
            <div class="bg-white rounded-3 p-4" style="overflow: hidden; height:100vh; margin-left: 13px">
                <div class="d-flex justify-content-between mt-2">
                    <a class="align-self-center navbar-brand fw-bold" style="color:#000">CMS Portfolio / Portfolio Item</a>
                </div>
               
                 
                    <div class="input-box mt-4" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3" >Project Name*</label>
                        <input type="text" placeholder="Enter Project Name" pclass='@error("project_name") is invalid @enderror' name='project_name' value="{{ $portofolio->project_name }}" placeholder="Enter project name" required style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:35px; padding:15px; font-size:100; font-weight:500;">
                    </div>
                     @error('project_name')
                     <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="input-box mt-5" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3">Client*</label>
                        <input type="text" placeholder="Enter Client"   class='@error("client") is invalid @enderror' value="{{ $portofolio->client }}" name='client' placeholder="Enter client" required style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:35px; padding:15px; font-size:100; font-weight:500;">
                    </div>
                    @error('client')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="input-box mt-5" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3">Service*</label>
                        <select name="service" id=""  style="background: #f2f2f2; border:none;padding-left:15px; border-radius:10px; width:100%; height:35px;   font-weight:500;">
                            @foreach ($services as $service)
                                @if (old('service',$portofolio->service) == $service->service)
                            <option value="{{ $service->service }}" selected style="font-size:100;">{{ $service->service }}</option>
                             @else
                            <option value="{{ $service->service }}" style="font-size:100;">{{ $service->service }}</option>        
                                @endif
                            @endforeach
                        
                        </select>                    </div>
                    @if ($portofolio->status === 'OnGoing')
                    <div class="input-box mt-5" style="">
                        <input type="checkbox" type="checkbox" name="status[]" id="stat" value="OnGoing" checked>
                        <label class="fw-bold">This is a rapier project at the moment</label>
                    </div> 
                    <div class="input-box mt-3" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3">Start Date*</label>
                        <input class="@error('waktu_mulai')is invalid @enderror" type="date"name="waktu_mulai" id="waktu_mulai" value="{{ date('Y-m-d', strtotime($portofolio->waktu_mulai)) }}" placeholder="Enter service" required style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:35px; padding:15px; font-size:100; font-weight:500;">
                        @error('waktu_mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>                    
                    <div id='waktu_selesai'class="input-box mt-5" style="position:relative; width: 100%; height:30px; display: none">
                        <label class="fw-bold mb-3">End Date*</label>
                        <input class="@error('waktu_selesai')is invalid @enderror" type="date" name="waktu_selesai" id="waktu_selesa" value="{{ date('Y-m-d', strtotime($portofolio->waktu_mulai))  }}" placeholder="Enter service" required style="background: #f2f2f2; display:none;border:none; border-radius:10px; width:100%; height:35px; padding:15px; font-size:100; font-weight:500;">
                        @error('waktu_selesai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    @else
                    <div class="input-box mt-5" style="">
                        <input type="checkbox" type="checkbox" name="status[]" id="stat" value="OnGoing">
                        <label class="fw-bold">This is a rapier project at the moment</label>
                    </div>    
                    <div class="input-box mt-3" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3">Start Date*</label>
                        <input class="@error('waktu_mulai')is invalid @enderror" type="date"name="waktu_mulai" id="waktu_mulai" value="{{ date('Y-m-d', strtotime($portofolio->waktu_mulai)) }}" placeholder="Enter service" required style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:35px; padding:15px; font-size:100; font-weight:500;">
                        @error('waktu_mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div><div class="input-box mt-5" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3">End Date*</label>
                        <input class="@error('waktu_selesai')is invalid @enderror" type="date" name="waktu_selesai" id="waktu_selesai" value="{{ date('Y-m-d', strtotime($portofolio->waktu_mulai))  }}" placeholder="Enter service" required style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:35px; padding:15px; font-size:100; font-weight:500;" min="{{ date('Y-m-d', strtotime($portofolio->waktu_mulai))  }}">
                        @error('waktu_selesai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    @endif
                    <div class="input-box mt-5" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3">Description</label>
                        <input type="text"  class='@error("description") is invalid @enderror' value="{{ $portofolio->description }}" name='description' placeholder="Enter description" required style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:38px; padding:15px; font-size:100; font-weight:500;">
                    </div>
                    @error('client')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                
                    <div class="input-box mt-5" style="position:relative; width: 100%; height:30px;">
                        <label class="fw-bold mb-3" style="">Cover*</label>
                        <input type="file" name='cover'  style="background: #f2f2f2; border:none; border-radius:10px; width:100%; height:40px; padding:5px; font-size:100; font-weight:500;">
                    </div>
                    <input type="hidden" name="oldImage" id="" value="{{ $portofolio->image }}">
                    <div style="position: absolute; top:95px ; right:8%;">
                        <button type="submit"  class="btn ml-3"
                            style="background-color:#FF1F1F; --bs-btn-font-size: .70rem; --bs-btn-padding-x: 1rem; color:#F5F5F5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    const checkbox = document.getElementById('stat');
    const inputElement = document.getElementById('waktu_selesai');
    const ie = document.getElementById('waktu_selesa');
    
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            inputElement.style.display = 'none';
            ie.style.display = 'none' // Menonaktifkan input saat checkbox diceklik
        } else {
            inputElement.style.display = 'block';
            ie.style.display = 'block' // Mengaktifkan input saat checkbox tidak diceklik
        }
    });
</script>
</html>
@endsection