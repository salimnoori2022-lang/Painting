@extends('layouts.adminmaster')
@section('admin')
@if(session('status'))
<div class="alert alert-success">
   <p>{{session('status')}}</p>
</div>
@endif
@if(session('Email-sent'))
<div class="alert alert-success">
   <p>{{session('Email-sent')}}</p>
</div>
@endif
<div class="container my-4">
<div class="card" style="background-color: aliceblue "> <h3 style="text-align: center">Appointments</h3></div>
    <table class="table">

  <thead>
    <tr>
      
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE NUMBER</th>
      <th scope="col">PAINTING TYPE</th>
      <th scope="col">MASSAGE</th>
      <th scope="col">DATE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    
      @foreach ($a as $item)                
    <tr>
      
      <td>{{$item->user-> name}}</td>
      <td>{{$item->user-> email}}</td>
      <td>{{$item-> phone}}</td>
      <th>{{$item-> type}}</th>
      <td>{{$item-> massage}}</td>
      <td>{{$item-> date}}</td>
      <td>
      <a type='button' class='btn btn-danger btn-sm bi bi-trash' href="{{url('delete',$item-> id)}}">Delete</a>
      <a type='button' class='btn btn-info btn-sm fa fa-envelope-o' href="{{url('sentmail',$item-> id)}}">Email</a>

      </td>
    </tr>
    
@endforeach
    
   
  </tbody>
</table>
<i class='pagination'>
  {{$a->links('pagination::bootstrap-5')}}
</i>
</div>
@endsection



  