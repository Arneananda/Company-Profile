@extends('index')

@section('container')
<div class="container">
    <div class="">
        <nav class="navbar">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold">CMS Customer & Patner</a>
              <a href="#"><img src="{{'asetes/img/logo.png' }}" alt="" style="border-radius:50%; width: 30px;"></a>
            </div>
          </nav>
    </div>

    <div class="container-fluid">
    <form style="padding-bottom: 20px;"  class="d-flex" role="search"  action="/customer-partner">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
        <button type="submit" class="btn ml-3" style="background-color:#FF1F1F; --bs-btn-font-size: .70rem; --bs-btn-padding-x: 1rem; color:#F5F5F5; margin-right:6px;">Search</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600;background-color:white ; color:#FF1F1F;">
            New Customer & Partner
        </button>
    </form>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content"  style="height:500px; width:800px; position: relative; left:-20%;">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Customer/Partner</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer" style="display: flex; flex-direction: column">
                <form action="/add-pc" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="company_name">Company Name*</label>
                    <input type="text" placeholder="Enter Company Name" class="@error('company_name') is-invalid @enderror"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px; font-family: inter" name="company_name" id="company_name"  autocomplete="off">
                    <div class="invalid-feedback">
                      @error('company_name')
                        {{ $message }}
                      @enderror
                     </div>
                    <label for="type">Type*</label>
                    <select name="type" id="type"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                        <option value="customer">Customer</option>
                        <option value="partnership">Partnership</option>
                    </select>
                    <label for="image">Photo *</label>
                    <input class="@error('image') is-invalid @enderror" type="file" name="image" id="image" required style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                   <div class="invalid-feedback">
                    @error('image')
                      {{ $message }}
                    @enderror
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
      @if ($custs->count() == 0)
            <h1 style="font-weight: 700;position: relative;left:35%; color:#b6b6b6;" >Data Not Found</h1>       
       @else   
      <thead>
            <tr >
                <th style="color: #b6b6b6; font-weight:400;">Company Name</th>
                <th style="color: #b6b6b6; font-weight:400;">Type</th>
                <th style="color: #b6b6b6; font-weight:400;">Logos</th>
                <th style="color: #b6b6b6; font-weight:400;">Action</th>
            </tr>
        </thead>
        <tbody>
            {{ $custs->links() }}
            @foreach ($custs as $cust)
            <tr style="background-color: white;">
                <td>{{ $cust->company_name }}</td>
                <td>{{ $cust->type }}</td>
                <td><img src="{{ asset('storage/' . $cust->image) }}" alt="" width="70px" height="70px"></td>
                <td style="display: flex;flex-direction: row; padding:24px  10px;"> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: red;border:none;font-size:13px;margin-right:3px;">
                  Hapus
                </button>
                  <form action="/delete/{{ $cust->id }}" method="post">
                  @csrf
                  @method('delete')
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
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $cust->id }}" style="background-color:white;border:1px solid red; font-size: 13px;color:#FF1F1F;">
                    Edit
                    </button>
                    <div class="modal fade" id="updateModal{{ $cust->id }}" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content"  style="height:500px; width:800px; position: relative; left:-20%;">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Customer/Partner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-footer" style="display: flex; flex-direction: column">
                              <form action="/update-custpart/{{ $cust->id }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <label for="company_name">Company Name*</label>
                                  <input type="text" name="company_name" id="company_name" value="{{ $cust->company_name }}"  autocomplete="off" style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                                  <label for="type"> Type*</label>
                                  <select name="type" id="type"   style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                                      <option value="Customer" {{ (old('type', $cust->type) === 'customer') ? 'selected' : '' }}>Customer</option>
                                      <option value="Partnership" {{ (old('type', $cust->type) === 'partnership') ? 'selected' : '' }}>Partnership</option>
                                  </select>         
                                  <label for="image"> Photo *</label>                           
                                <input type="file" name="image" id="image" style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px" required>
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:45%; top:85%; ">Simpan</button>
                             
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
            </tr>
        @endforeach
            @endif
        </tbody>
      </table>
   </div>
</div>
</div>
@endsection
