@extends('index')

@section('container')
<table>
    @foreach ($users as $user)
        
   
    <tr>
        <td>Nama</td>
        <td>{{ $user->name }}</td>
    </tr>
    @endforeach
</table>
@endsection