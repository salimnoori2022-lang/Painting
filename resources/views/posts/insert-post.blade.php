

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
  <title>Add New Post</title>

</head>
<body>
  <div class="container" style="background-color: aquamarine">
      <div class="row">
        <div>
        <a href="{{ route('index') }}" class="btn btn-secondary bi bi-house">Return to Main Page</a>
       </div>
       
        <div class="col-md-6 offset-md-3">
            <div class="card" style="background-color:aliceblue">
                <div class="card-header">
                    Add New Post
                </div>
                <div class="card-body">

                      @if(Session('post_added'))
                        <div  class="alert alert-success" role="alert">
                          {{Session('post_added')}}
                        </div>
                      @endif
                </div>
            </div>
            
          <form action="{{url('store')}}" onsubmit ="" name="form" method="POST" enctype="multipart/form-data">
           @csrf  
          <div class="form-group">
             <label >Title:</label>
              <select class="form-control" name="title" id="title">
                      
                                             <option>Interior Painting</option>
                                             <option>Exterior Painting</option>
                                             <option>Residential Painting</option>
                                             <option>Roof Painting</option>
                                             <option>Commercial Painting</option>
                                             <option>Decorative Finishes</option>
                                        </select>
           
            </div>

            <div class="form-group">
            <label >Image:</label>
            <input type="file" id="Image"  name="Image" class="form-control">
            </div>
            
            <div class="form-group">
             <label >Description:</label>
                   <textarea id="description" name="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            
          
            
            <div class="form-group">
             <label >Date:</label>
            <input type="Date" id="date"  name="date"  class="form-control">
            </div>
        

             
             
            <input type="submit" id="btn" value="Submit" name="submit" class="btn btn-info btn-lg" style="">
             
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
 
   
           
            
       




  