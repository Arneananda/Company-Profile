@extends('index')

@section('container')
<div class="container">
    <div class="">
        <nav class="navbar">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold">Settings Social Media</a>
              <a href="#"><img src="{{'asetes/img/logo.png' }}" alt="" style="border-radius:50%; width: 30px;"></a>
            </div>
          </nav>
    </div>
    </div>
    <div class="bg-white rounded-3 p-3" style="overflow: hidden; height:100vh; margin-left: 13px">
        <table class="table table-hover" style="background-color: #F5F5F5;">
            <thead>
                <tr >
                    <th style="color: #b6b6b6; font-weight:500; font-size:12px">Social Media Name</th>
                    <th style="color: #b6b6b6; font-weight:500; font-size:12px">Link</th>
                    <th style="color: #b6b6b6; font-weight:500; font-size:12px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
        
 
                <tr><th>{{ $link->name }}</th>
                    <td>{{ $link->link }}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal{{ $link->id }}" style="--bs-btn-font-size: .70rem; --bs-btn-padding-x: 2rem; border-color:#FF1F1F; font-weight:600;background-color:white ; color:#FF1F1F;">
                    Edit
                    </button> <div class="modal fade" id="formModal{{ $link->id }}" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content"  style="height:220px; width:800px; position: relative; left:-20%;">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Form Link</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <form action="/edit-link/{{ $link->id }}" method="POST" >
                                    @csrf
                                    <label for="link" style="font-weight: 700;font-size: 16px">{{ $link->name }}</label>
                                    <input type="text" name="link" id="link" value="{{ $link->link }}"  autocomplete="off"  style="width:760px; box-sizing:border-box; padding:8px 14px ; height:40px; background-color: #F5F5F5; border:0; border-radius: 8px">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" style="background-color: red;border:none; position:absolute; left:45%; top:77%; ">Simpan</button>
                                    </form>
                                
                            </div>
                          </div>
                        </div>
                      </div></td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection