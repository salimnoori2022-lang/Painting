@extends('layouts.adminmaster')
@section('admin')
                      

                      @if(Session('delete.user'))
                        <div  class="alert alert-success" role="alert">
                          {{Session('delete.user')}}
                        </div>
                      @endif
<div class="container my-4">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">TYPE</th>
      <th scope="col">ACTION</th>
      
    </tr>
  </thead>
  <tbody>
    
      @foreach ($user as $item)                
    <tr>
      <th >{{$item-> id}}</th>
      <td>{{$item-> name}}</td>
      <td>{{$item-> email}}</td>
      <td>{{$item-> type}}</td>
    
      <td>
      <a type='button' class='btn btn-danger btn-sm bi bi-trash' href="{{url('deleteuser',$item-> id)}}">Delete</a>
      <a type='button' class='btn btn-info btn-sm bi bi-pencil' href="{{url('edituser',$item-> id)}}">Edit</a>
      </td>
    </tr>
    
@endforeach
    
   
  </tbody>
</table>
<i class='pagination'>
  {{$user->links()}}
</i>
</div>
@endsection



  