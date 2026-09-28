
@extends('layouts.adminmaster')
@section('admin')
    
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white py-3">
          <h5 class="card-title mb-0">Update User  Role</h5>
           @if(Session('user_adit'))
                        <div  class="alert alert-success" role="alert">
                          {{Session('user_adit')}}
                        </div>
                      @endif
        </div>
        <div class="card-body p-4">
          <form class="needs-validation" onsubmit ="" name="form" action="{{route('updateuser.show')}}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf   
          <input type="hidden" name="id" value="{{$user->id}}">
            <!-- Row 1: First Name & Last Name -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" required>
                <div class="invalid-feedback">Please enter a first name.</div>
              </div>
              
            </div>

          

            <!-- Row 3: Role (Select Menu) -->
            <div class="mb-3">
              <label for="userRole" class="form-label">Account Role</label>
              <select class="form-select" name="type"  id="type" value="{{$user->type}}" required>
                <option value="Admin">Admin</option>
                <option value="user" >User</option>
                
              </select>
            </div>

         
           

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2 border-top pt-3">
              <button type="button" class="btn btn-outline-secondary">Cancel</button>
              <button type="submit" id="btn" value="submit" name="submit" class="btn btn-primary">Save Changes</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



