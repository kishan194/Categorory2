
         
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
  
    <link rel="stylesheet" href="{{ asset('css/create.css') }}"  type="text/css">
   <link rel="stylesheet" href="{{ asset('css/footer.css') }}"  type="text/css">
   
</head>

<header>
@include('layout.header')
</header>

<body>
    
    <h1>Create Category</h1>
        
     @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif

    <form id="myform" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name"  required>
        </div>

        <div class="form-group">
            <label for="image">Category Image:</label>
            <input type="file" name="image">
        </div>
        <div id="successMessage" style="display: none;">Data added successfully.</div>
 
        <button type="submit"  class="btn btn-success">Create Category</button>
        <a href="{{url('/categories')}}" id="btnSubmit" class="btn btn-success">Back</a>
    </form>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
    $("#myform").submit(function(e){
        e.preventDefault();

        var form = $(this)[0]; 
        var data = new FormData(form); 

        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{ route('categories.store') }}",
            data: data,
            processData: false, 
            contentType: false,
            success: function(response) {
                
              $("#successMessage").show(); 
            },
            error: function(xhr, status, error) {
              
            },
            complete: function() {
                $("#btnSubmit").prop("disabled", false);
            }
        });
    });
});

</script>
</body>

</html>





