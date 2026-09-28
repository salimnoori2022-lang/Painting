


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    <link rel="stylesheet" href="{{asset('assets/css/admincss.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/tooplate-style.css')}}">
  <title>Edit Post</title>

</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 
   <div class="container" style="background-color: aquamarine">
      <div class="row">
       <div>
        <a href="{{ route('index') }}" class="btn btn-secondary bi bi-house">Return to Main Page</a>
       </div>
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Edit Post
                </div>
                <div class="card-body">

                      @if(Session('post_adit'))
                        <div  class="alert alert-success" role="alert">
                          {{Session('post_adit')}}
                        </div>
                      @endif
                </div>
            </div>
            
          <form action="{{route('updatepost.store')}}" onsubmit ="" name="form" method="POST" enctype="multipart/form-data" style="background-color: blueviolet">
           @csrf  
           
           <input type="hidden" name="id" value="{{$post->id}}">
          <div class="form-group">
             <label >Title:</label>
             
            <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control" >
            </div>

             @if($post->imagename)
        <div class="mb-3">
            <img src="{{ asset('images/' . $post->imagename) }}" alt="Current Image" width="150">
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1">
                <label class="form-check-label" for="remove_image">
                    حذف تصویر فعلی
                </label>
            </div>
        </div>
          @endif
            <div class="form-group">
            <label >Image:</label>
            <input type="file" id="imagename"  name="imagename"   class="form-control">
            </div>
            
            <div class="form-group">
             <label >Description:</label>
               <textarea id="description" name="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
            </div>
            
         
            
            <div class="form-group">
             <label >Date:</label>
            <input type="Date" id="date"  name="date" value="{{$post->date}}" class="form-control">
            </div>
           

             
             
            <input type="submit" id="btn" value="submit" name="submit" class="btn btn-info btn-lg" >
             
        </form>

        </div>
    </div>
          
         </div>   
           
            
       
      <script src="assets/js/jquery.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/jquery.sticky.js"></script>
     <script src="assets/js/jquery.stellar.min.js"></script>
     <script src="assets/js/wow.min.js"></script>
     <script src="assets/js/smoothscroll.js"></script>
     <script src="assets/js/owl.carousel.min.js"></script>
     <script src="assets/js/custom.js"></script>
</body>
</html>



  